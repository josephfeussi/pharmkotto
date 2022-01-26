@extends('templates.main')
@section('title')

@section('head')
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

@endsection

@section('body')

    @include('sections.header',['page_title'=>'About'])

    <div class="mt-8">
        <p class="text-sm font-bold text-center text-blue-700 uppercase">The cores & values</p>

        <h1 class="mt-8 text-5xl font-medium tracking-wide text-center text-gray-700">Our idealogy to craft digital<br>
            products that make presence </h1>
    </div>


    <div class="flex mx-auto mt-16 max-w-7xl">
        <div class="w-1/4 p-4">
            <div class="flex flex-col items-center">
                <span class="text-6xl font-light text-indigo-400 mdi mdi-bullseye"></span>
                <p class="mt-4 text-lg font-bold text-gray-700">Vision & Mission</p>
                <p class="mt-4 font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Voluptatibus, nisi.</p>
            </div>
        </div>


        <div class="w-1/4 p-4">
            <div class="flex flex-col items-center">
                <span class="text-6xl font-light text-yellow-400 mdi mdi-diamond-stone"></span>
                <p class="mt-4 text-lg font-bold text-gray-700">Vision & Mission</p>
                <p class="mt-4 font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Voluptatibus, nisi.</p>
            </div>
        </div>




        <div class="w-1/4 p-4">
            <div class="flex flex-col items-center">
                <span class="text-6xl font-light text-green-400 mdi mdi-bullseye-arrow"></span>
                <p class="mt-4 text-lg font-bold text-gray-700">Vision & Mission</p>
                <p class="mt-4 font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Voluptatibus, nisi.</p>
            </div>
        </div>




        <div class="w-1/4 p-4">
            <div class="flex flex-col items-center">
                <span class="text-6xl font-light text-purple-400 mdi mdi-projector-screen"></span>
                <p class="mt-4 text-lg font-bold text-gray-700">Vision & Mission</p>
                <p class="mt-4 font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Voluptatibus, nisi.</p>
            </div>
        </div>


    </div>



    <div class="py-16 mt-16 bg-yellow-400">
        <div class="mx-auto text-center text-white max-w-7xl">
            <p class="text-sm font-medium tracking-wide uppercase">VIEW, ORGANIZE AND PRIORITIZE ALL OF YOUR TEAM’S
                PROJECTS
            </p>

            <p class="mt-8 text-5xl font-medium">
                5,000,000+ organizations are already using SASWeb

            </p>
            <div class="mt-16 ">
                <a href="#"
                    class="px-16 py-4 font-bold text-black transition-colors duration-300 bg-white hover:text-white hover:bg-blue-700">Start
                    your free trial now</a>

            </div>
        </div>
    </div>


    <div class="py-16 mx-auto max-w-7xl">
        <div class="text-4xl text-center">Meet our <span class="text-blue-900">Leadership</span> </div>

        <div class="flex mt-8">
            <div class="w-1/3 px-8 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/mam_profile.png') }}" alt="CEO" class="h-80 w-80">
                    <p class="mt-4 text-xl font-semibold">Mami Raboijaona</p>
                    <p class="mt-1 text-gray-700">CEO & Co-founder</p>
                    <div class="w-16 h-px my-2 bg-gray-500"></div>
                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>
            </div>




            <div class="w-1/3 px-8 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/mam_profile.png') }}" alt="CEO" class="h-80 w-80">
                    <p class="mt-4 text-xl font-semibold">Mami Raboijaona</p>
                    <p class="mt-1 text-gray-700">CEO & Co-founder</p>
                    <div class="w-16 h-px my-2 bg-gray-500"></div>
                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>



            </div>

            <div class="w-1/3 px-8 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/mam_profile.png') }}" alt="CEO" class="h-80 w-80">
                    <p class="mt-4 text-xl font-semibold">Mami Raboijaona</p>
                    <p class="mt-1 text-gray-700">CEO & Co-founder</p>
                    <div class="w-16 h-px my-2 bg-gray-500"></div>
                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>



            </div>
        </div>


        <div class="py-16">
            <div class="mx-auto max-w-7xl">
                <h2 class="text-6xl font-semibold text-blue-900">Our history</h2>

                <div class="w-64 h-1 bg-yellow-400 rounded-full"></div>
                <div class="flex items-center w-full mt-8">
                    <div class="w-7/12">
                        <p class="text-gray-700">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi impedit quam excepturi error, dolor laudantium sequi similique, nulla unde, ullam corporis saepe molestias! Tenetur numquam id nostrum similique molestiae illo temporibus corporis officiis repellat veritatis. Quaerat laudantium aut eos in soluta perferendis alias, modi ex nostrum ullam? Vel, maxime ullam!

                        </p>

                        <p class="mt-8 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, nulla laborum quae dolore qui debitis suscipit voluptate eius neque earum.
                        </p>
                    </div>
                    <div class="flex-1">
                        <img src="{{ asset('images/illustration/Giving a Presentation (1).svg') }}" alt="History" class="">
                    </div>
                </div>



                <div class="flex flex-row-reverse items-center w-full mt-8">
                    <div class="w-7/12">
                        <p class="text-gray-700">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi impedit quam excepturi error, dolor laudantium sequi similique, nulla unde, ullam corporis saepe molestias! Tenetur numquam id nostrum similique molestiae illo temporibus corporis officiis repellat veritatis. Quaerat laudantium aut eos in soluta perferendis alias, modi ex nostrum ullam? Vel, maxime ullam!

                        </p>

                        <p class="mt-8 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, nulla laborum quae dolore qui debitis suscipit voluptate eius neque earum.
                        </p>
                    </div>
                    <div class="flex-1">
                        <img src="{{ asset('images/illustration/Giving a Presentation (1).svg') }}" alt="History" class="">
                    </div>
                </div>



                <div class="flex items-center w-full mt-8">
                    <div class="w-7/12">
                        <p class="text-gray-700">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi impedit quam excepturi error, dolor laudantium sequi similique, nulla unde, ullam corporis saepe molestias! Tenetur numquam id nostrum similique molestiae illo temporibus corporis officiis repellat veritatis. Quaerat laudantium aut eos in soluta perferendis alias, modi ex nostrum ullam? Vel, maxime ullam!

                        </p>

                        <p class="mt-8 text-gray-700">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus, nulla laborum quae dolore qui debitis suscipit voluptate eius neque earum.
                        </p>
                    </div>
                    <div class="flex-1">
                        <img src="{{ asset('images/illustration/Giving a Presentation (1).svg') }}" alt="History" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full py-16 mt-16 bg-lightBlue-200">
        <div class="mx-auto text-center text-blueGray-700 max-w-7xl">
            <p class="text-sm font-medium tracking-wide uppercase">Il's nous font confiances pour leur projets

            </p>

            <p class="mt-8 text-5xl font-medium">
                Nos organisation partenaires

            </p>
            <div class="flex mt-16 text-5xl justify-evenly">
                <div>
                    <span class="text-blue-900 mdi mdi-facebook"></span>
                </div>

                <div>
                    <span class="text-red-300 mdi mdi-google"></span>
                </div>


                <div>
                    <span class="text-yellow-400 mdi mdi-amazon"></span>
                </div>


                <div>
                    <span class="text-purple-600 mdi mdi-aws"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="py-16 mx-auto max-w-7xl">
        <div class="text-5xl text-center text-blueGray-700">Team members deserving<br>
            to help all customers </div>

        <div class="flex mt-12">
            <div class="w-1/3 px-8 ">
                <div class="flex flex-col ">
                    <img src="{{ asset('images/raphael_profile.png') }}" alt="CEO" class="object-cover object-center overflow-hidden border-none rounded-lg h-72 w-96">
                    <p class="mt-4 text-xl font-semibold">Raphaël MVIE ZIBI</p>
                    <p class="mt-1 text-gray-700">Project manager</p>
                    <div class="flex">
                        <div class="w-16 h-1 my-2 bg-yellow-400 rounded-full"></div>
                        <div class="w-32 h-1 mx-4 my-2 bg-yellow-400 rounded-full"></div>

                    </div>

                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>
            </div>




            <div class="w-1/3 px-8 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/mam_profile.png') }}" alt="CEO" class="h-80 w-80">
                    <p class="mt-4 text-xl font-semibold">Mami Raboijaona</p>
                    <p class="mt-1 text-gray-700">CEO & Co-founder</p>
                    <div class="w-16 h-px my-2 bg-gray-500"></div>
                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>



            </div>

            <div class="w-1/3 px-8 ">
                <div class="flex flex-col">
                    <img src="{{ asset('images/mam_profile.png') }}" alt="CEO" class="h-80 w-80">
                    <p class="mt-4 text-xl font-semibold">Mami Raboijaona</p>
                    <p class="mt-1 text-gray-700">CEO & Co-founder</p>
                    <div class="w-16 h-px my-2 bg-gray-500"></div>
                    <div class="font-light text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro ea
                        id velit impedit suscipit soluta odio omnis dolorum, quae officia.</div>

                </div>



            </div>
        </div>



    </div>



    @endsection
