<!DOCTYPE html>
<html lang="id">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://cdn.tailwindcss.com"></script>
 <title>Fixed Size Grid Card Image Zoom</title>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

 <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

  <div
   class="w-[300px] h-[150px] bg-white rounded-xl shadow-lg overflow-hidden flex group hover:border border-slate-300 transition-border  duration-100">
   <div class="w-[35%] h-full shrink-0 relative overflow-hidden">
    <img class="h-full w-full object-cover transition duration-500 group-hover:scale-125"
     src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
     alt="Kopi">
   </div>
   <div class="w-[65%] p-3 flex flex-col justify-center">
    <span class="text-xs font-bold text-indigo-500 uppercase">Gayo</span>
    <h3 class="text-sm font-bold text-slate-800 leading-tight mt-1">Aroma Tanah Aceh</h3>
    <button class="mt-2 text-xs bg-indigo-500 text-white py-1 px-2 rounded w-fit hover:bg-indigo-600">
     Detail
    </button>
   </div>
  </div>

  <div class="w-[250px] h-[150px] bg-white rounded-xl shadow-lg overflow-hidden flex group">
   <div class="w-[35%] h-full shrink-0 relative overflow-hidden">
    <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
     src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
     alt="Kopi">
   </div>
   <div class="w-[65%] p-3 flex flex-col justify-center">
    <span class="text-xs font-bold text-indigo-500 uppercase">Toraja</span>
    <h3 class="text-sm font-bold text-slate-800 leading-tight mt-1">Legenda Sulawesi</h3>
    <button class="mt-2 text-xs bg-indigo-500 text-white py-1 px-2 rounded w-fit hover:bg-indigo-600">
     Detail
    </button>
   </div>
  </div>

  <div class="w-[250px] h-[150px] bg-white rounded-xl shadow-lg overflow-hidden flex group">
   <div class="w-[35%] h-full shrink-0 relative overflow-hidden">
    <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
     src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
     alt="Kopi">
   </div>
   <div class="w-[65%] p-3 flex flex-col justify-center">
    <span class="text-xs font-bold text-indigo-500 uppercase">Bali</span>
    <h3 class="text-sm font-bold text-slate-800 leading-tight mt-1">Jeruk Kintamani</h3>
    <button class="mt-2 text-xs bg-indigo-500 text-white py-1 px-2 rounded w-fit hover:bg-indigo-600">
     Detail
    </button>
   </div>
  </div>

  <div class="w-[250px] h-[150px] bg-white rounded-xl shadow-lg overflow-hidden flex group">
   <div class="w-[35%] h-full shrink-0 relative overflow-hidden">
    <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
     src="https://images.unsplash.com/photo-1507133750069-69d3cdadca2e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
     alt="Kopi">
   </div>
   <div class="w-[65%] p-3 flex flex-col justify-center">
    <span class="text-xs font-bold text-indigo-500 uppercase">Lampung</span>
    <h3 class="text-sm font-bold text-slate-800 leading-tight mt-1">Robusta Kuat</h3>
    <button class="mt-2 text-xs bg-indigo-500 text-white py-1 px-2 rounded w-fit hover:bg-indigo-600">
     Detail
    </button>
   </div>
  </div>

 </div>

</body>

</html>