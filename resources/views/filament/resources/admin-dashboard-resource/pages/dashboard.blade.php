{{-- <x-filament::page>
    <div style="padding:20px; background:#f4f6f8; border-radius:8px;">
        <div style="display:flex; align-items:center; gap:15px;">
           
            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" width="60" style="border-radius:50%;">

     
            <div>
                <p style="font-weight:bold; font-size:18px;">
                    Bonjour, {{ auth()->user()->name }}
                </p>
                <p style="color:#6b7280;">Bienvenue sur le tableau de bord de CampusMaster</p>
            </div>


            <div style="margin-left:auto;">
                <a href="{{ route('filament.auth.logout') }}" style="color:red; font-weight:bold;">
                    Déconnexion
                </a>
            </div>
        </div>

        <hr style="margin:20px 0; border-color:#d1d5db;">

        <!-- Widgets statistiques -->
        <div style="display:flex; gap:20px; flex-wrap:wrap;">
            <!-- Exemple de widget simple -->
            <div style="flex:1 1 200px; background:white; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <p style="font-weight:bold; font-size:16px;">Étudiants inscrits</p>
                <p style="font-size:24px; margin-top:5px; color:#1d4ed8;">
                    {{ \App\src\Infrastructure\Persistence\User::where('role', 'student')->count() }}
                </p>
            </div>

            <div style="flex:1 1 200px; background:white; padding:20px; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <p style="font-weight:bold; font-size:16px;">Inscriptions en attente</p>
                <p style="font-size:24px; margin-top:5px; color:#f59e0b;">
                    {{ \App\src\Infrastructure\Persistence\User::where('status', 'pending')->count() }}
                </p>
            </div>
        </div>

        <hr style="margin:20px 0; border-color:#d1d5db;">

        <!-- Version et liens -->
        <div style="display:flex; justify-content:space-between; flex-wrap:wrap; font-size:14px; color:#6b7280;">
            <div>
                Version : v3.3.46
            </div>
            <div>
                <a href="https://filamentphp.com/docs" target="_blank">Documentation</a> |
                <a href="https://github.com/filamentphp/filament" target="_blank">GitHub</a>
            </div>
        </div>
    </div>
</x-filament::page> --}}
