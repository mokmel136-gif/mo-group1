@extends('layouts.frontend')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/20 py-16">
        <div class="max-w-6xl mx-auto px-6">
            
            {{-- Breadcrumb --}}
            <div class="mb-8">
                <nav class="flex items-center space-x-2 space-x-reverse text-sm font-bold">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-blue-600 transition">الرئيسية</a>
                    <span class="text-gray-300">/</span>
                    <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-blue-600 transition">المشاريع</a>
                    <span class="text-gray-300">/</span>
                    <span class="text-gray-900">{{ $project->title }}</span>
                </nav>
            </div>

            {{-- Project Header --}}
            <div class="bg-white/90 backdrop-blur-xl rounded-[3rem] shadow-[0_30px_80px_-20px_rgba(0,0,0,0.1)] border border-gray-100 p-12 mb-10">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <span class="inline-block px-5 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-xs font-black rounded-full mb-4">{{ $project->category->name }}</span>
                        <h1 class="text-5xl font-black text-gray-900 mb-4 leading-tight">{{ $project->title }}</h1>
                        <p class="text-gray-500 font-bold text-lg leading-relaxed">{{ $project->description }}</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4 space-x-reverse mt-8 pt-8 border-t border-gray-100">
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl font-black hover:from-blue-700 hover:to-indigo-700 transition shadow-xl shadow-blue-100 hover:shadow-2xl hover:-translate-y-1 duration-300">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            عرض مباشر
                        </a>
                    @endif

                    @if($project->file_path)
                        <a href="{{ Storage::url($project->file_path) }}" download class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-2xl font-black hover:from-green-600 hover:to-emerald-700 transition shadow-xl shadow-green-100 hover:shadow-2xl hover:-translate-y-1 duration-300">
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                            تحميل المشروع
                        </a>
                    @endif

                    <div class="flex-1"></div>
                    <span class="text-sm font-bold text-gray-400">{{ $project->created_at->format('Y/m/d') }}</span>
                </div>
            </div>

            {{-- Image Gallery --}}
            @if($project->images->count() > 0)
                <div class="bg-white/90 backdrop-blur-xl rounded-[3rem] shadow-[0_30px_80px_-20px_rgba(0,0,0,0.1)] border border-gray-100 p-12">
                    <h2 class="text-3xl font-black text-gray-900 mb-8">معرض الصور</h2>
                    
                    <div x-data="{ activeImage: '{{ Storage::url($project->images->first()->image_path) }}' }">
                        {{-- Main Image --}}
                        <div class="relative mb-6 group">
                            <img :src="activeImage" class="w-full h-[600px] object-cover rounded-3xl shadow-2xl border-4 border-white">
                        </div>

                        {{-- Thumbnails --}}
                        <div class="grid grid-cols-5 gap-6">
                            @foreach($project->images as $image)
                                <div @click="activeImage = '{{ Storage::url($image->image_path) }}'" class="cursor-pointer group relative">
                                    <img src="{{ Storage::url($image->image_path) }}" class="w-full h-32 object-cover rounded-2xl shadow-lg border-2 border-gray-100 group-hover:border-blue-500 transition duration-300">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Thumbnail if no gallery images --}}
            @if($project->images->count() == 0 && $project->thumbnail)
                <div class="bg-white/90 backdrop-blur-xl rounded-[3rem] shadow-[0_30px_80px_-20px_rgba(0,0,0,0.1)] border border-gray-100 p-12">
                    <img src="{{ Storage::url($project->thumbnail) }}" class="w-full h-[600px] object-cover rounded-3xl shadow-2xl border-4 border-white">
                </div>
            @endif

        </div>
    </div>
@endsection
