<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>感謝您的填寫！</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300 min-h-screen">
  <!-- 使用 flex 讓內容在畫面中央 -->
  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-gray-100 rounded-lg shadow-lg p-6 md:p-8 w-full max-w-2xl md:max-w-4xl">
      <!-- 感謝標題 -->
      <div class="text-center mb-6 md:mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-orange-500 mb-2">
          感謝您的填寫！
        </h1>
        <p class="text-sm md:text-base text-gray-600">
          您的回覆已成功送出 ✨
        </p>
      </div>

      <!-- 大家的回覆區塊 -->
      <div class="space-y-4">
        <h2 class="text-lg md:text-2xl font-bold text-orange-500 border-b-2 border-orange-200 pb-2">
          大家的回覆：
        </h2>

        <div class="space-y-4 max-h-96 overflow-y-auto">
          @if($responses->count())
          @foreach($responses as $response)
          <div class="bg-gray-50 border-l-4 border-orange-400 p-4 rounded-r-lg hover:bg-gray-100 transition duration-200">
            <!-- 回覆者資訊 -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3">
              <div class="flex items-center space-x-2 mb-2 md:mb-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-base font-medium 
                                                @if($response->answer == '9898') bg-green-100 text-green-800 @else bg-yellow-100 text-yellow-800 @endif">
                  {{ $response->answer == '9898' ? '好啊 😊' : '下次ㄅ 😅' }}
                </span>
                <span class="text-sm md:text-base font-semibold text-gray-700">
                  {{ $response->name }}
                </span>
              </div>
            </div>

            <!-- 詳細資訊 -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm md:text-base">
              <!-- 日期 -->
              <div>
                <span class="font-medium text-orange-600">📅 日期：</span>
                <div class="mt-1">
                  <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-base">
                    {{ $response->date }}
                  </span>

                </div>
              </div>

              <!-- 食物 -->
              <div>
                <span class="font-medium text-orange-600">🍽️ 想吃：</span>
                <div class="mt-1">
                  <span class="inline-block bg-red-100 text-red-800 px-2 py-1 rounded text-base">
                    {{ $response->food }}
                  </span>
                </div>
              </div>

              <!-- 留言 -->
              <div class="mt-3 pt-3 border-t border-gray-200">
                <span class="font-medium text-orange-600">💬 留言：</span>
                <p class="mt-1 text-sm md:text-base text-gray-700 italic">
                  "{{ $response->remark }}"
                </p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-gray-500">目前還沒有任何人填寫喔～快來當第一位吧！</p>
          @endif
        </div>

        <!-- 返回按鈕 -->
        <div class="mt-6 md:mt-8 text-center">
          <a href="/"
            class="inline-block px-6 md:px-10 py-3 bg-blue-500 text-white font-semibold rounded-lg 
                          hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 focus:outline-none 
                          transition duration-300 ease-in-out transform hover:scale-105">
            重新填寫
          </a>
        </div>
      </div>
    </div>
</body>

</html>