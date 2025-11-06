<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <!-- En-tête -->
        <div class="bg-indigo-600 p-6">
            <h1 class="text-2xl font-bold text-white">Ma Todo List</h1>
            <p class="text-indigo-200 mt-1">Organisez vos tâches quotidiennes</p>
        </div>
        
        <!-- Formulaire d'ajout -->
        

        <div class="p-6 border-b">
            <form action="{{route('task.store')}}" method="POST">
            @csrf

            <div class="flex items-center"> 
                <div>
                    <input name="title" type="text" 
                    placeholder=  "Nouvelle tâche..." 
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <input name="description" type="text" 
                    placeholder=  "Description..." 
                    class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <button type="submit" 
                    class="bg-indigo-600 text-white px-6 py-6 rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            
            
        </form>
        </div>
        
        <!-- Liste des tâches -->
        <div class="p-6">
            <div class="space-y-4">
                @forelse ($tasks as $task)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 text-indigo-600">
                            <i class="fas fa-circle text-xs"></i>
                        </span>
                        <span class="text-gray-800"> <a href="{{route('task.show', $task)}}"> {{$task->title}} </a></span>
                    </div>
                    <div class="flex gap-2">
                        <button class="text-green-600 hover:text-green-800 transition-colors">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-800 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                
                </div>
                @empty
                    
                @endforelse

            </div>
            
            <!-- Statistiques -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="flex justify-between text-sm text-gray-500">
                    <span>Total: 4 tâches</span>
                    <span>Terminées: 1</span>
                    <span>En cours: 3</span>
                </div>
            </div>
        </div>
        
        <!-- Pied de page -->
        <div class="bg-gray-50 p-4 text-center text-gray-500 text-sm">
            <p>Cliquez sur <i class="fas fa-check text-green-600"></i> pour marquer comme terminé</p>
        </div>
    </div>
</body>
</html>