<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-auto mb-4">
                Birdboard
            </h2>
            <a href="/projects/create">
                Create New Projects
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-disc text-blue-700">
                        @forelse($projects as $project)
                            <li>
                                <a href="{{$project->path()}}" class="underline ">
                                    {{$project->title}}
                                </a>
                            </li>
                        @empty
                            <li> No Projects yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
