@extends('templates.main')

@section('head')
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
@endsection

@section('body')

<section class="relative w-full py-16 bg-blue-900 bg-center bg-cover" style="background-image: url('{{asset("images/bg/header-background.jpg")}}')">
    <div class="container mx-auto max-w-7xl pt-44 pb-96 ">
        <h1 class="text-6xl font-bold tracking-wide text-center text-white">Analyse des acteurs</h1>
        <p class="max-w-3xl mx-auto mt-4 leading-6 text-center text-warmGray-300">L'analyse des acteur est un outils revolutionaire Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui libero, sit nulla accusamus quidem amet suscipit veritatis quod impedit adipisci!</p>
    </div>


    <div class="absolute bottom-[-30%] w-full">
        <div class="container mx-auto mt-8 max-w-7xl">
            <img src="{{ asset('images/screens/analyse-des-acteurs.png') }}" alt="">
        </div>
    </div>

</section>

    <section class="py-40 bg-gray-200">
        <div class="py-16">
            <div class="container px-6 mx-auto max-w-7xl ">

                <div class="items-center justify-between lg:flex">
                    <div class="flex w-full mt-8 justify-evenly p-7">
                         <div class="flex flex-col items-center justify-center">
                           <a href="#" class="p-6 text-6xl text-white bg-yellow-400"><i class="mdi mdi-rocket-launch hover:animate-bounce"></i></a>
                           <p class="mt-2 text-lg font-bold">Real time data</p>
                       </div>

                       <div class="flex flex-col items-center justify-center">
                        <a href="#" class="p-6 text-6xl text-white bg-purple-600"><i class="mdi mdi-cogs"></i></a>
                        <p class="mt-2 text-lg font-bold">Real time data</p>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <a href="#" class="p-6 text-6xl text-white bg-red-600"><i class="mdi mdi-thumb-up"></i></a>
                        <p class="mt-2 text-lg font-bold">Real time data</p>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <a href="#" class="p-6 text-6xl text-white bg-teal-600"><i class="mdi mdi-record-circle"></i></a>
                        <p class="mt-2 text-lg font-bold">Real time data</p>
                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <a href="#" class="p-6 text-6xl text-white bg-pink-600"><i class="mdi mdi-chart-donut-variant"></i></a>
                        <p class="mt-2 text-lg font-bold">Real time data</p>
                    </div>

                    </div>

                </div>



                <div class="flex flex-col justify-center mt-8 md:flex-row">
                    <div class="flex flex-col justify-center md:w-3/5">
                        <p class="text-sm font-bold text-blue-900 uppercase">Description</p>
                        <div class="mt-1 text-xl font-black uppercase md:text-4xl">Des outils manifique pour vos projet</div>
                        <div class="mt-4 tracking-wide">Faites valoire les forces de votre entreprises Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo illo aspernatur quaerat unde error fugiat voluptates suscipit soluta repellat ab!</div>
                    </div>
                    <div class="flex justify-start w-full pl-8 mt-5 md:justify-end">
                        <img src="{{ asset('images/screens/analyse-des-acteur-files.png') }}" alt="" class="rounded-lg">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section
    class="py-40 bg-center bg-no-repeat bg-contain"
    style="background:url('{{asset("images/bg/pattern_memphis-3_6_3_0-0_25_2__ffec3d00_0024f0_f948c1_8f5cff.png")}}')"
    >
<div class="container mx-auto max-w-7xl">
    <p class="text-4xl font-bold text-blueGray-800">Welcome</p>
</div>
</section>
    <section >
        <div class="container p-12 mx-auto max-w-7xl">



            <div class="flex flex-col justify-center md:flex-row">
                <div class="flex flex-col justify-center md:w-1/2">
                    <div class="text-xl font-black uppercase md:text-4xl">Des outils manifique pour vos projet</div>
                    <div class="mt-4 text-xl">Faites valoire les forces de votre entreprises</div>
                </div>
                <div class="flex justify-start w-full mt-5 md:w-1/2 md:justify-end ">
                    <div class="flex-auto max-w-sm p-10 pb-20 shadow-md">
                        <div class="w-full">
                            <div class="h-6 mt-3 text-xs font-bold leading-8 text-gray-600 uppercase"><span class="mr-1 text-red-400">*</span> First Name</div>
                            <div class="flex p-1 my-2 bg-white border border-gray-200 rounded">  <input placeholder="Jhon" class="w-full p-1 px-2 text-gray-800 outline-none appearance-none">  </div>
                        </div>
                        <div class="w-full">
                            <div class="h-6 mt-3 text-xs font-bold leading-8 text-gray-600 uppercase"><span class="mr-1 text-red-400">*</span> Last Name</div>
                            <div class="flex p-1 my-2 bg-white border border-gray-200 rounded">  <input placeholder="Doe" class="w-full p-1 px-2 text-gray-800 outline-none appearance-none">  </div>
                        </div>
                        <div class="w-full">
                            <div class="h-6 mt-3 text-xs font-bold leading-8 text-gray-600 uppercase"><span class="mr-1 text-red-400">*</span> Email</div>
                            <div class="flex p-1 my-2 bg-white border border-gray-200 rounded">  <input placeholder="jhon@doe.com" class="w-full p-1 px-2 text-gray-800 outline-none appearance-none">  </div>
                        </div>
                        <div class="relative mt-6">
                            <div class="absolute w-full px-4 py-2 text-lg font-medium text-center text-green-100 bg-teal-600 rounded shadow-md cursor-pointer tr-mt">Souscrire</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-1 mb-8 uppercase sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-5">
                <div
                    class="flex items-center gap-5 px-6 py-5 mt-5 transition bg-indigo-200 rounded-lg shadow-xl cursor-pointer group bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-300 ring-cyan-700 hover:bg-blue-500 hover:bg-opacity-100">
                    <img class="w-9"
                         src="data:image/svg+xml,%3C?xml version='1.0' encoding='utf-8'?%3E %3C!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --%3E %3Csvg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 80 80' style='enable-background:new 0 0 80 80;' xml:space='preserve'%3E %3Cstyle type='text/css'%3E .st0%7Bfill:%23DD0031;%7D .st1%7Bfill:%23C3002F;%7D .st2%7Bfill:%23FFFFFF;%7D %3C/style%3E %3Cg%3E %3Cpolygon class='st0' points='40,0 40,0 40,0 2.8,13.3 8.4,62.5 40,80 40,80 40,80 71.6,62.5 77.2,13.3 '/%3E %3Cpolygon class='st1' points='40,0 40,8.9 40,8.8 40,49.4 40,49.4 40,80 40,80 71.6,62.5 77.2,13.3 '/%3E %3Cpath class='st2' d='M40,8.8L16.7,61l0,0h8.7l0,0l4.7-11.7h19.8L54.5,61l0,0h8.7l0,0L40,8.8L40,8.8L40,8.8L40,8.8L40,8.8z M46.8,42.2H33.2L40,25.8L46.8,42.2z'/%3E %3C/g%3E %3C/svg%3E"
                         alt=""/>
                    <div>
                        <span>Analyse des acteurs</span>
                        <span class="block text-xs text-blue-800">Simple</span>
                    </div>
                    <div>
                        <i class="block transition transform -translate-x-1 opacity-0 fa fa-chevron-right group-hover:opacity-100 group-hover:translate-x-0"></i>
                    </div>
                </div>

                <div
                    class="flex items-center gap-5 px-6 py-5 mt-5 transition bg-indigo-200 rounded-lg shadow-xl cursor-pointer group bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-300 ring-cyan-700 hover:bg-blue-500 hover:bg-opacity-100">
                    <img class="w-9"
                         src="data:image/svg+xml,%3C?xml version='1.0' encoding='utf-8'?%3E %3C!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --%3E %3Csvg version='1.1' id='Layer_2_1_' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 80 80' style='enable-background:new 0 0 80 80;' xml:space='preserve'%3E %3Cstyle type='text/css'%3E .st0%7Bfill:%2361DAFB;%7D %3C/style%3E %3Cg%3E %3Cpath class='st0' d='M80,40c0-5.3-6.6-10.3-16.8-13.4c2.3-10.4,1.3-18.6-3.3-21.3c-1.1-0.6-2.3-0.9-3.7-0.9V8 c0.8,0,1.4,0.1,1.9,0.4c2.2,1.3,3.2,6.1,2.4,12.3c-0.2,1.5-0.5,3.1-0.8,4.8c-3.2-0.8-6.7-1.4-10.4-1.8c-2.2-3-4.5-5.8-6.8-8.2 C47.9,10.7,52.9,8,56.3,8V4.4l0,0c-4.5,0-10.4,3.2-16.3,8.7C34,7.6,28.2,4.4,23.7,4.4v3.6c3.4,0,8.4,2.7,13.7,7.6 c-2.3,2.4-4.6,5.1-6.7,8.1c-3.7,0.4-7.2,1-10.4,1.8c-0.4-1.6-0.7-3.2-0.8-4.7c-0.8-6.2,0.2-11.1,2.4-12.4c0.5-0.3,1.1-0.4,1.9-0.4 V4.5l0,0c-1.4,0-2.6,0.3-3.7,0.9c-4.6,2.6-5.6,10.9-3.2,21.2C6.6,29.7,0,34.7,0,40c0,5.3,6.6,10.3,16.8,13.4 c-2.3,10.4-1.3,18.6,3.3,21.3c1.1,0.6,2.3,0.9,3.7,0.9c4.5,0,10.4-3.2,16.3-8.7c5.9,5.5,11.8,8.7,16.3,8.7c1.4,0,2.6-0.3,3.7-0.9 c4.6-2.6,5.6-10.9,3.2-21.2C73.4,50.3,80,45.3,80,40z M58.8,29.1c-0.6,2.1-1.4,4.3-2.2,6.4c-0.7-1.3-1.4-2.6-2.1-3.9 c-0.8-1.3-1.5-2.6-2.3-3.8C54.4,28.2,56.6,28.6,58.8,29.1z M51.3,46.5c-1.3,2.2-2.6,4.3-3.9,6.2c-2.4,0.2-4.9,0.3-7.4,0.3 c-2.5,0-4.9-0.1-7.3-0.3c-1.4-1.9-2.7-4-3.9-6.2c-1.2-2.1-2.4-4.3-3.4-6.5c1-2.2,2.2-4.4,3.4-6.5c1.3-2.2,2.6-4.3,3.9-6.2 c2.4-0.2,4.9-0.3,7.4-0.3c2.5,0,4.9,0.1,7.3,0.3c1.4,1.9,2.7,4,3.9,6.2c1.2,2.1,2.4,4.3,3.4,6.5C53.7,42.2,52.5,44.4,51.3,46.5z M56.6,44.4c0.9,2.2,1.6,4.4,2.3,6.5c-2.1,0.5-4.4,1-6.7,1.3c0.8-1.3,1.6-2.5,2.3-3.9C55.2,47,55.9,45.7,56.6,44.4z M40,61.8 c-1.5-1.6-3-3.3-4.5-5.2c1.5,0.1,3,0.1,4.5,0.1c1.5,0,3,0,4.5-0.1C43.1,58.5,41.5,60.2,40,61.8z M27.9,52.2 c-2.3-0.3-4.5-0.8-6.7-1.3c0.6-2.1,1.4-4.3,2.2-6.4c0.7,1.3,1.4,2.6,2.1,3.9C26.3,49.7,27.1,50.9,27.9,52.2z M40,18.2 c1.5,1.6,3,3.3,4.5,5.2c-1.5-0.1-3-0.1-4.5-0.1c-1.5,0-3,0-4.5,0.1C36.9,21.5,38.5,19.8,40,18.2z M27.9,27.8 c-0.8,1.3-1.6,2.5-2.3,3.9c-0.8,1.3-1.5,2.6-2.1,3.9c-0.9-2.2-1.6-4.4-2.3-6.5C23.3,28.6,25.6,28.2,27.9,27.8z M13.1,48.3 c-5.8-2.5-9.5-5.7-9.5-8.3c0-2.6,3.7-5.8,9.5-8.3c1.4-0.6,2.9-1.1,4.5-1.6c0.9,3.2,2.2,6.5,3.7,9.9c-1.5,3.4-2.7,6.7-3.6,9.9 C16.1,49.4,14.6,48.9,13.1,48.3z M21.9,71.6c-2.2-1.3-3.2-6.1-2.4-12.3c0.2-1.5,0.5-3.1,0.8-4.8c3.2,0.8,6.7,1.4,10.4,1.8 c2.2,3,4.5,5.8,6.8,8.2C32.1,69.3,27.1,72,23.8,72C23,72,22.4,71.8,21.9,71.6z M60.6,59.1c0.8,6.2-0.2,11.1-2.4,12.4 c-0.5,0.3-1.1,0.4-1.9,0.4c-3.4,0-8.4-2.7-13.7-7.6c2.3-2.4,4.6-5.1,6.7-8.1c3.7-0.4,7.2-1,10.4-1.8C60.1,56,60.4,57.6,60.6,59.1z M66.9,48.3c-1.4,0.6-2.9,1.1-4.5,1.6c-0.9-3.2-2.2-6.5-3.7-9.9c1.5-3.4,2.7-6.7,3.6-9.9c1.6,0.5,3.1,1.1,4.6,1.7 c5.8,2.5,9.5,5.7,9.5,8.3C76.4,42.6,72.6,45.8,66.9,48.3z'/%3E %3Cpath class='st0' d='M23.7,4.4L23.7,4.4L23.7,4.4z'/%3E %3Ccircle class='st0' cx='40' cy='40' r='7.5'/%3E %3Cpath class='st0' d='M56.2,4.4L56.2,4.4L56.2,4.4z'/%3E %3C/g%3E %3C/svg%3E"
                         alt=""/>
                    <div>
                        <span>Analyse des acteurs</span>
                        <span class="block text-xs text-blue-800">Relationnelle</span>
                    </div>
                    <div>
                        <i class="block transition transform -translate-x-1 opacity-0 fa fa-chevron-right group-hover:opacity-100 group-hover:translate-x-0"></i>
                    </div>
                </div>

                <div
                    class="flex items-center gap-5 px-6 py-5 mt-5 transition bg-indigo-200 rounded-lg shadow-xl cursor-pointer group bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-300 ring-cyan-700 hover:bg-blue-500 hover:bg-opacity-100">
                    <img class="w-9"
                         src="data:image/svg+xml,%3C?xml version='1.0' encoding='UTF-8'?%3E %3Csvg width='36px' height='30px' viewBox='0 0 36 30' version='1.1' xmlns='http://www.w3.org/2000/svg'%3E %3Ctitle%3EUntitled%3C/title%3E %3Cg id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E %3Crect id='Rectangle' fill='%231389FD' x='15' y='21' width='21' height='7' rx='3.5'%3E%3C/rect%3E %3Ctext id='BETA' font-family='Roboto-Medium, Roboto' font-size='5' font-weight='400' fill='%23FFFFFF'%3E %3Ctspan x='22' y='26'%3EBETA%3C/tspan%3E %3C/text%3E %3Cg id='vue' fill-rule='nonzero'%3E %3Cg id='Group' transform='translate(18.000000, 15.000000) scale(-1, 1) rotate(-180.000000) translate(-18.000000, -15.000000) translate(-0.000000, -0.000000)'%3E %3Cg transform='translate(0.010406, 0.001744)' fill='%2341B883' id='Path'%3E %3Cpolygon points='20.9853249 29.8255814 17.053785 22.9772093 13.1222451 29.8255814 0.0296569468 29.8255814 17.053785 0.170930233 34.0779131 29.8255814'%3E%3C/polygon%3E %3C/g%3E %3Cg transform='translate(6.774271, 11.862209)' fill='%2334495E' id='Path'%3E %3Cpolygon points='14.2214599 17.9651163 10.28992 11.1167442 6.35838003 17.9651163 0.0754431103 17.9651163 10.28992 0.172674419 20.5043968 17.9651163'%3E%3C/polygon%3E %3C/g%3E %3C/g%3E %3C/g%3E %3C/g%3E %3C/svg%3E"
                         alt=""/>
                    <div>
                        <span>Analyse des acteurs</span>
                        <span class="block text-xs text-blue-800">Complete</span>
                    </div>
                    <div>
                        <i class="block transition transform -translate-x-1 opacity-0 fa fa-chevron-right group-hover:opacity-100 group-hover:translate-x-0"></i>
                    </div>
                </div>

                <div
                    class="flex items-center gap-5 px-6 py-5 mt-5 transition bg-indigo-200 rounded-lg shadow-xl cursor-pointer group bg-opacity-40 ring-2 ring-offset-2 ring-offset-blue-300 ring-cyan-700 hover:bg-blue-500 hover:bg-opacity-100">
                    <img class="w-9"
                         src="data:image/svg+xml,%3C?xml version='1.0' encoding='utf-8'?%3E %3C!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --%3E %3Csvg version='1.1' id='Ebene_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 80 80' style='enable-background:new 0 0 80 80;' xml:space='preserve'%3E %3Cstyle type='text/css'%3E .st0%7Bfill:%23FF3E00;%7D .st1%7Bfill:%23FFFFFF;%7D %3C/style%3E %3Cpath class='st0' d='M69,10.6C61.6,0,46.9-3.2,36.3,3.6L17.7,15.4c-5.1,3.2-8.6,8.4-9.7,14.3c-0.9,4.9-0.1,10,2.2,14.5 c-1.6,2.4-2.7,5.1-3.2,8C6,58.2,7.4,64.4,11,69.4c7.5,10.6,22.1,13.8,32.7,7l18.6-11.9c5.1-3.2,8.6-8.4,9.7-14.3 c0.9-4.9,0.1-10-2.2-14.5c1.6-2.4,2.7-5.1,3.2-8C74,21.8,72.6,15.6,69,10.6'/%3E %3Cpath class='st1' d='M34.7,69.6c-5.8,1.5-12-0.8-15.4-5.7c-2.1-2.9-2.9-6.5-2.3-10.1c0.1-0.6,0.2-1.1,0.4-1.7l0.3-1l0.9,0.7 c2.1,1.6,4.5,2.8,7.1,3.5l0.7,0.2l-0.1,0.7c-0.1,1,0.2,1.9,0.7,2.7c1,1.5,2.9,2.2,4.7,1.8c0.4-0.1,0.8-0.3,1.1-0.5l18.1-11.5 c0.9-0.6,1.5-1.5,1.7-2.5c0.2-1.1,0-2.1-0.7-3c-1-1.5-2.9-2.2-4.7-1.7c-0.4,0.1-0.8,0.3-1.1,0.5l-6.9,4.4c-1.1,0.7-2.4,1.3-3.7,1.6 c-5.8,1.5-12-0.8-15.4-5.7c-2.1-2.9-2.9-6.5-2.3-10.1c0.6-3.5,2.7-6.5,5.6-8.4l18.1-11.5c1.1-0.7,2.4-1.3,3.7-1.6 c5.8-1.5,12,0.8,15.4,5.7c2.1,2.9,2.9,6.5,2.3,10.1c-0.1,0.6-0.2,1.1-0.4,1.7l-0.3,1l-0.9-0.7c-2.1-1.6-4.5-2.8-7.1-3.5l-0.7-0.2 l0.1-0.7c0.1-1-0.2-1.9-0.7-2.7c-1-1.5-2.9-2.2-4.7-1.7c-0.4,0.1-0.8,0.3-1.1,0.5L29.1,31.5C28.2,32,27.5,33,27.4,34 c-0.2,1.1,0,2.2,0.7,3c1,1.5,2.9,2.2,4.7,1.7c0.4-0.1,0.8-0.3,1.1-0.5l6.9-4.4c1.1-0.7,2.4-1.3,3.7-1.6c5.8-1.5,12,0.8,15.4,5.7 c2.1,2.9,2.9,6.5,2.3,10.1c-0.6,3.5-2.7,6.5-5.6,8.4L38.4,67.9C37.2,68.7,36,69.2,34.7,69.6'/%3E %3C/svg%3E"
                         alt=""/>
                    <div>
                        <span>Decouvrir plus</span>
                        <span class="block text-xs text-blue-800">Cliquez ici</span>
                    </div>
                    <div>
                        <i class="block transition transform -translate-x-1 opacity-0 fa fa-chevron-right group-hover:opacity-100 group-hover:translate-x-0"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WE CREATE -->
    <section class="h-full bg-yellow-300">
        <div class="container mx-auto max-w-7xl ">
            <div class="relative px-8 py-8 pt-16">
                <div>
                    <h1 class="text-6xl font-bold text-white">
                        <span class="px-4 py-4 text-5xl bg-blue-400 rounded-full">WE</span>CREATE
                    </h1>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-6 px-8 py-8">
                <div class="col-span-12 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5">
                    <div class="py-4">
                        <p class="text-lg font-semibold text-blue-900"><span class="font-bold text-red-400">01-</span>
                            OPTIMIZED <span class="font-bold">USER EXPERIENCES</span></p>
                        <p class="pl-8 text-sm text-blue-900">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                            type specimen book.
                        </p>
                    </div>
                    <div class="py-4">
                        <p class="text-lg font-semibold text-blue-900"><span class="font-bold text-red-400">02-</span>
                            ELEGENT <span class="font-bold">USER INTERFACES</span></p>
                    </div>
                    <div class="py-4">
                        <p class="text-lg font-semibold text-blue-900"><span class="font-bold text-red-400">03-</span>
                            BEAUTIFUL <span class="font-bold">GRAPHIC DESIGNS</span></p>
                    </div>
                    <div class="py-4">
                        <p class="text-lg font-semibold text-blue-900"><span class="font-bold text-red-400">04-</span>
                            TACTICAL <span class="font-bold">DIGITAL MARKETING</span></p>
                    </div>
                </div>
                <div class="flex justify-center col-span-12 sm:col-span-12 md:col-span-7 lg:col-span-7 xxl:col-span-7">
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/male-employee-looking-at-customer-review-2937682-2426381.png"
                         class="w-auto" />
                </div>
            </div>
        </div>

    </section>
    <!-- Grow With Us -->
    <section class="h-full bg-yellow-300">
        <div class="grid grid-cols-12 gap-0">
            <div
                class="h-full col-span-12 px-16 py-6 bg-red-500 sm:col-span-12 md:col-span-6 lg:col-span-6 xxl:col-span-6">
                <div>
                    <img src="https://superscene.pro/img/constructor/06.png" class="w-40 -ml-4" />
                    <h1 class="font-semibold text-white text-7xl">Grow With Us</h1>
                    <button
                        class="px-4 py-2 my-6 text-sm font-bold text-white uppercase rounded-lg shadow-xl bg-gradient-to-b from-yellow-400 to-yellow-500">
                        Hire Us
                    </button>
                </div>
            </div>
            <div
                class="h-full col-span-12 px-16 py-6 bg-blue-400 sm:col-span-12 md:col-span-6 lg:col-span-6 xxl:col-span-6">
                <div>
                    <img src="https://assets.materialup.com/uploads/641e0e0f-eddf-4d2c-b0ee-c6f55300bb1b/preview.png"
                         class="-ml-10 w-52" />
                    <h1 class="font-semibold text-white text-7xl">Say Hello</h1>
                    <button
                        class="px-4 py-2 my-6 text-sm font-bold text-white uppercase rounded-lg shadow-xl bg-gradient-to-b from-red-400 to-red-500">
                        Hello@123.com
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
