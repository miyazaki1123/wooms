export function getQueryParams(MQ) {
const urlParams = new URLSearchParams(window.location.search);

// クエリパラメータをオブジェクトとして取得する関数
function getQueryParams() {
    const params = {};
    for (const [key, value] of urlParams.entries()) {
        params[key] = value;
    }
    return params;
}

// 特定のクエリパラメータを取得する場合
const someParam = urlParams.get('someParam');

// すべてのクエリパラメータをオブジェクトとして取得
const allParams = getQueryParams();

console.log(someParam);
console.log(allParams);
}