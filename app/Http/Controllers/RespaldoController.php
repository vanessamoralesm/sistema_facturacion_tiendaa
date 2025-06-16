<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class RespaldoController extends Controller
{
    // Descargar respaldo .sql
    public function descargar()
    {
        $db = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        $filename = "respaldo_" . date('Y-m-d_H-i-s') . ".sql";
        $path = storage_path("app/respaldos/{$filename}");

        // Crear carpeta si no existe
        if (!File::exists(storage_path('app/respaldos'))) {
            File::makeDirectory(storage_path('app/respaldos'), 0755, true);
        }

        $mysqldumpPath = "C:\\xampp\\mysql\\bin\\mysqldump.exe"; // Ajusta si tu XAMPP está en otra ruta

        // Construcción del comando
        $paramPassword = $pass !== '' ? "-p\"$pass\"" : "";
        $command = "\"{$mysqldumpPath}\" -h {$host} -u {$user} {$paramPassword} --databases {$db} > \"{$path}\"";

        // Ejecutar
        exec("cmd /c {$command}", $output, $resultado);

        if ($resultado === 0 && file_exists($path)) {
            return redirect()->route('dashboard')->with([
                'success' => 'Se creó correctamente el respaldo',
                'filename' => $filename,
            ]);
        } else {
            return back()->with('error', 'Error al generar el respaldo.');
        }
    }

    // Descargar archivo .sql generado
    public function descargarArchivo($filename)
    {
        $path = storage_path("app/respaldos/{$filename}");

        if (file_exists($path)) {
            return response()->download($path)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Archivo no encontrado.');
    }

    // Vista del formulario para restaurar
    public function vistaRestaurar()
    {
        return view('respaldo.restaurar');
    }

    // Restaurar base de datos desde .sql
    public function restaurar(Request $request)
    {
        if ($request->hasFile('respaldo')) {
            $archivo = $request->file('respaldo');

            if ($archivo->isValid()) {
                $rutaTemporal = escapeshellarg($archivo->getRealPath());

                // Configuración DB
                $usuario = config('database.connections.mysql.username');
                $password = config('database.connections.mysql.password');
                $basedatos = config('database.connections.mysql.database');

                // Ruta mysql.exe
                $mysql = "C:\\xampp\\mysql\\bin\\mysql.exe"; // Asegúrate de que exista

                // Evitar que -p se pase si está vacío
                $paramPassword = $password !== '' ? "-p\"$password\"" : "";

                // Comando completo
                $comando = "\"$mysql\" -u $usuario $paramPassword $basedatos < $rutaTemporal";

                // Logs antes y después
                Log::info("Antes de ejecutar el comando");
                exec("cmd /c $comando 2>&1", $output, $retorno);
                Log::info("Después de ejecutar el comando");

                Log::info("Comando ejecutado: $comando");
                Log::info("Salida: " . print_r($output, true));
                Log::info("Código de retorno: $retorno");

                if ($retorno === 0) {
                    return redirect()->back()->with('success', 'Base de datos restaurada exitosamente.');
                } else {
                    return redirect()->back()->with('error', 'Error al restaurar la base de datos: ' . implode("\n", $output));
                }
            }
        }

        return redirect()->back()->with('error', 'Archivo no válido o no subido correctamente.');
    }
}