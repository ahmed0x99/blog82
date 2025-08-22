<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Blog - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'fadeInUp': 'fadeInUp 0.8s ease-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(139, 92, 246, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(139, 92, 246, 0.6)' }
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen text-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50  backdrop-blur-lg border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <div class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent animate-glow">
                        Bloggy
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-white/80 hover:text-purple-300 transition-colors duration-300">Home</a>
                    <a href="#" class="text-white/80 hover:text-purple-300 transition-colors duration-300">Articles</a>
                    <a href="#" class="text-white/80 hover:text-purple-300 transition-colors duration-300">Categories</a>
                    <a href="#" class="text-white/80 hover:text-purple-300 transition-colors duration-300">About</a>
                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 px-4 py-2 rounded-full transition-all duration-300 transform hover:scale-105">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-purple-200 to-pink-200 bg-clip-text text-transparent animate-fadeInUp">
                    Welcome to the Future
                </h1>
                <p class="text-xl md:text-2xl text-white/70 mb-8 max-w-3xl mx-auto animate-fadeInUp">
                    Discover cutting-edge insights, innovative ideas, and transformative stories that shape tomorrow's world
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fadeInUp">
                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                        Start Reading
                    </button>
                    <button class="border-2 border-white/30 hover:border-purple-400 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 backdrop-blur-sm">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Featured Articles
                </h2>
                <p class="text-xl text-white/70">Handpicked stories that inspire and inform</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach (App\Models\Article::get() as $item)

                <!-- Featured Post 1 -->
                <article class="group bg-white/5 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-purple-400/50 transition-all duration-500 transform hover:scale-105 hover:shadow-2xl animate-float">
                    <div class="h-48 bg-gradient-to-br from-purple-400 to-pink-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-medium">{{$item->category->name}}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 group-hover:text-purple-300 transition-colors">
                            {{$item->title}}
                        </h3>
                        <p class="text-white/70 mb-4 text-sm leading-relaxed">
                            {{$item->content}}
                        </p>
                        <div class="flex items-center justify-between text-sm text-white/50">
                            <span>{{$item->time_to_read}} min read</span>
                            <span>{{ $item->published_at}}</span>
                        </div>
                    </div>
                </article>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-black/20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                    Popular Categories
                </h2>
                <p class="text-xl text-white/70">Explore topics that matter to you</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="group bg-gradient-to-br from-purple-500/20 to-pink-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-purple-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">🚀</div>
                    <h3 class="font-bold text-white group-hover:text-purple-300 transition-colors">Technology</h3>
                    <p class="text-white/50 text-sm mt-1">156 posts</p>
                </div>
                <div class="group bg-gradient-to-br from-blue-500/20 to-cyan-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-blue-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">🎨</div>
                    <h3 class="font-bold text-white group-hover:text-blue-300 transition-colors">Design</h3>
                    <p class="text-white/50 text-sm mt-1">89 posts</p>
                </div>
                <div class="group bg-gradient-to-br from-green-500/20 to-emerald-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-green-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">💼</div>
                    <h3 class="font-bold text-white group-hover:text-green-300 transition-colors">Business</h3>
                    <p class="text-white/50 text-sm mt-1">124 posts</p>
                </div>
                <div class="group bg-gradient-to-br from-yellow-500/20 to-orange-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-yellow-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">🌟</div>
                    <h3 class="font-bold text-white group-hover:text-yellow-300 transition-colors">Lifestyle</h3>
                    <p class="text-white/50 text-sm mt-1">78 posts</p>
                </div>
                <div class="group bg-gradient-to-br from-red-500/20 to-pink-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-red-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">📚</div>
                    <h3 class="font-bold text-white group-hover:text-red-300 transition-colors">Education</h3>
                    <p class="text-white/50 text-sm mt-1">92 posts</p>
                </div>
                <div class="group bg-gradient-to-br from-indigo-500/20 to-purple-500/20 backdrop-blur-lg rounded-2xl p-6 border border-white/10 hover:border-indigo-400/50 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                    <div class="text-4xl mb-3 group-hover:animate-bounce">🔬</div>
                    <h3 class="font-bold text-white group-hover:text-indigo-300 transition-colors">Science</h3>
                    <p class="text-white/50 text-sm mt-1">67 posts</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Posts Grid -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
                    Recent Posts
                </h2>
                <p class="text-xl text-white/70">Fresh content from our community</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Recent Post 1 -->
                <article class="group flex bg-white/5 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-green-400/50 transition-all duration-300 hover:shadow-xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-green-400 to-blue-500 flex-shrink-0"></div>
                    <div class="p-6 flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-green-500/20 text-green-300 px-2 py-1 rounded-full text-xs">Tech</span>
                            <span class="text-white/50 text-sm">2 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-green-300 transition-colors">
                            Quantum Computing Breakthroughs
                        </h3>
                        <p class="text-white/70 text-sm leading-relaxed">
                            Latest developments in quantum computing are reshaping our understanding...
                        </p>
                    </div>
                </article>

                <!-- Recent Post 2 -->
                <article class="group flex bg-white/5 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-blue-400/50 transition-all duration-300 hover:shadow-xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-400 to-purple-500 flex-shrink-0"></div>
                    <div class="p-6 flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-blue-500/20 text-blue-300 px-2 py-1 rounded-full text-xs">Design</span>
                            <span class="text-white/50 text-sm">4 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-blue-300 transition-colors">
                            UI Trends for 2025
                        </h3>
                        <p class="text-white/70 text-sm leading-relaxed">
                            Exploring the next generation of user interface design patterns...
                        </p>
                    </div>
                </article>

                <!-- Recent Post 3 -->
                <article class="group flex bg-white/5 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-purple-400/50 transition-all duration-300 hover:shadow-xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-purple-400 to-pink-500 flex-shrink-0"></div>
                    <div class="p-6 flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-purple-500/20 text-purple-300 px-2 py-1 rounded-full text-xs">Business</span>
                            <span class="text-white/50 text-sm">6 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-purple-300 transition-colors">
                            Remote Work Evolution
                        </h3>
                        <p class="text-white/70 text-sm leading-relaxed">
                            How companies are adapting to the new era of distributed teams...
                        </p>
                    </div>
                </article>

                <!-- Recent Post 4 -->
                <article class="group flex bg-white/5 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/10 hover:border-yellow-400/50 transition-all duration-300 hover:shadow-xl">
                    <div class="w-32 h-32 bg-gradient-to-br from-yellow-400 to-orange-500 flex-shrink-0"></div>
                    <div class="p-6 flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded-full text-xs">Lifestyle</span>
                            <span class="text-white/50 text-sm">8 hours ago</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 group-hover:text-yellow-300 transition-colors">
                            Mindful Productivity Tips
                        </h3>
                        <p class="text-white/70 text-sm leading-relaxed">
                            Balancing efficiency with mental wellness in our daily routines...
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Author Spotlight -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-purple-900/20 to-pink-900/20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-pink-400 to-red-400 bg-clip-text text-transparent">
                    Featured Authors
                </h2>
                <p class="text-xl text-white/70">Meet the minds behind our content</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Author 1 -->
                <div class="group bg-white/5 backdrop-blur-lg rounded-2xl p-8 border border-white/10 hover:border-pink-400/50 transition-all duration-300 transform hover:scale-105 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-pink-400 to-red-500 rounded-full mx-auto mb-4 group-hover:animate-pulse"></div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-pink-300 transition-colors">Sarah Chen</h3>
                    <p class="text-white/50 mb-4">Technology Writer</p>
                    <p class="text-white/70 text-sm leading-relaxed mb-4">
                        Passionate about emerging technologies and their impact on society. 10+ years in tech journalism.
                    </p>
                    <div class="flex justify-center gap-4 text-sm text-white/50">
                        <span>47 Articles</span>
                        <span>•</span>
                        <span>12K Followers</span>
                    </div>
                </div>

                <!-- Author 2 -->
                <div class="group bg-white/5 backdrop-blur-lg rounded-2xl p-8 border border-white/10 hover:border-blue-400/50 transition-all duration-300 transform hover:scale-105 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full mx-auto mb-4 group-hover:animate-pulse"></div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-blue-300 transition-colors">Marcus Johnson</h3>
                    <p class="text-white/50 mb-4">Design Director</p>
                    <p class="text-white/70 text-sm leading-relaxed mb-4">
                        Award-winning designer with expertise in UX/UI and brand identity. Creative visionary and mentor.
                    </p>
                    <div class="flex justify-center gap-4 text-sm text-white/50">
                        <span>32 Articles</span>
                        <span>•</span>
                        <span>8.5K Followers</span>
                    </div>
                </div>

                <!-- Author 3 -->
                <div class="group bg-white/5 backdrop-blur-lg rounded-2xl p-8 border border-white/10 hover:border-green-400/50 transition-all duration-300 transform hover:scale-105 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full mx-auto mb-4 group-hover:animate-pulse"></div>
                    <h3 class="text-xl font-bold mb-2 group-hover:text-green-300 transition-colors">Elena Rodriguez</h3>
                    <p class="text-white/50 mb-4">Business Strategist</p>
                    <p class="text-white/70 text-sm leading-relaxed mb-4">
                        MBA with focus on digital transformation and startup ecosystems. Former Fortune 500 consultant.
                    </p>
                    <div class="flex justify-center gap-4 text-sm text-white/50">
                        <span>28 Articles</span>
                        <span>•</span>
                        <span>15K Followers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-gradient-to-r from-indigo-500/10 to-purple-500/10 backdrop-blur-lg rounded-3xl p-12 border border-white/10">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                        Our Community
                    </h2>
                    <p class="text-xl text-white/70">Join thousands of readers worldwide</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center group">
                        <div class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2 group-hover:animate-pulse">
                            50K+
                        </div>
                        <p class="text-white/70">Active Readers</p>
                    </div>
                    <div class="text-center group">
                        <div class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent mb-2 group-hover:animate-pulse">
                            1.2K+
                        </div>
                        <p class="text-white/70">Articles Published</p>
                    </div>
                    <div class="text-center group">
                        <div class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent mb-2 group-hover:animate-pulse">
                            150+
                        </div>
                        <p class="text-white/70">Expert Authors</p>
                    </div>
                    <div class="text-center group">
                        <div class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent mb-2 group-hover:animate-pulse">
                            25+
                        </div>
                        <p class="text-white/70">Countries Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 backdrop-blur-lg rounded-3xl p-12 border border-white/10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    Stay Updated
                </h2>
                <p class="text-xl text-white/70 mb-8">
                    Get the latest articles and insights delivered straight to your inbox
                </p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Enter your email" 
                        class="flex-1 px-4 py-3 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 focus:border-purple-400 focus:outline-none text-white placeholder-white/50"
                    >
                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-4 sm:px-6 lg:px-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <div class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        BlogSphere
                    </div>
                    <p class="text-white/50 mt-2">Shaping tomorrow's perspectives</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-white/50 hover:text-purple-300 transition-colors">Privacy</a>
                    <a href="#" class="text-white/50 hover:text-purple-300 transition-colors">Terms</a>
                    <a href="#" class="text-white/50 hover:text-purple-300 transition-colors">Contact</a>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-white/10 text-center text-white/50">
                <p>&copy; 2024 BlogSphere. All rights reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>


{{-- repo ----> (local , remote) --}}