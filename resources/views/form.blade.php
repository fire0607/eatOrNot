<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>台南女子監獄聚餐意向調查</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300 min-h-screen">
  <!-- 使用 flex 讓表單在畫面中央 -->
  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-gray-100 rounded-lg shadow-lg p-6 md:p-8 w-full max-w-md md:max-w-lg">
      <!-- 標題 -->
      <h1 class="text-2xl md:text-3xl font-extrabold text-orange-500 text-center mb-6 md:mb-8">
        台南女子監獄聚餐意向調查
      </h1>

      <form method="POST" action="/submit" class="space-y-6">
        @csrf
        <!-- 姓名欄位 -->
        <div class="space-y-3">
          <h3 class="text-base md:text-xl font-bold text-orange-500">你誰啊</h3>
          <div>
            <input type="text" name="name" placeholder="請輸入您的姓名"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg 
                      focus:ring-2 focus:ring-orange-500 focus:border-orange-500 
                      text-sm md:text-base transition duration-200
                      hover:border-gray-400">
          </div>
        </div>
        <!-- 第一個問題：約嗎 -->
        <div class="space-y-3">
          <h2 class="text-lg md:text-2xl font-bold text-orange-500">
            張庭與6月要約嗎？
          </h2>
          <div class="space-y-2">
            <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="radio" name="answer" value="9898" required
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2">
              <span class="text-sm md:text-base">好啊</span>
            </label>
            <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="radio" name="answer" value="8888"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2">
              <span class="text-sm md:text-base">下次ㄅ</span>
            </label>
          </div>
        </div>

        <!-- 第二個問題：日期 -->
        <div class="space-y-3">
          <h3 class="text-base md:text-xl font-bold text-orange-500">
            可以的日期
            <span class="block md:inline text-sm md:text-base text-red-500 font-normal">
              *只能約晚上
            </span>
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/2"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/2</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/3"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/3</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/4"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/4</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/5"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/5</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/6"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/6</span>
            </label>
            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="checkbox" name="date[]" value="6/7"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">6/7</span>
            </label>
          </div>
          @if($errors->has('date'))
          <p class="text-red-500 font-bold text-2xl">{{ $errors->first('date') }}</p>
          @endif
        </div>

        <!-- 第三個問題：要吃啥 -->
        <div class="space-y-3">
          <h3 class="text-base md:text-xl font-bold text-orange-500">要吃啥？</h3>
          <div class="space-y-2">
            <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="radio" name="food[]" value="饗麻饗辣"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">饗麻饗辣</span>
            </label>
            <label class="flex items-center space-x-3 cursor-pointer hover:bg-gray-50 p-2 rounded">
              <input type="radio" name="food[]" value="涮奶葉"
                class="w-4 h-4 text-orange-500 focus:ring-orange-500 focus:ring-2 rounded">
              <span class="text-sm md:text-base">涮奶葉</span>
            </label>
          </div>
        </div>
        <!-- 留言欄位 -->
        <div class="space-y-3">
          <h3 class="text-base md:text-xl font-bold text-orange-500">留言</h3>
          <div>
            <textarea name="remark" rows="4" placeholder="有什麼想說的嗎？"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg 
                         focus:ring-2 focus:ring-orange-500 focus:border-orange-500 
                         text-sm md:text-base resize-vertical transition duration-200
                         hover:border-gray-400"></textarea>
          </div>
        </div>
        <!-- 提交按鈕 -->
        <div class="pt-4">
          <button type="submit"
            class="w-full md:w-auto md:px-10 py-3 bg-blue-500 text-white font-semibold rounded-lg 
                                   hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none 
                                   transition duration-300 ease-in-out transform hover:scale-105">
            送出
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>