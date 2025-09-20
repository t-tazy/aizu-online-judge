#include<iostream>
#include<string>
#include<cctype>
using namespace std;

int main() {
  string w, t;
  int cnt = 0;

  cin >> w;

  while (1) {
    cin >> t;
    if (t == "END_OF_TEXT") break;

    string lowerT = t; // 初期化しないとエラーになる
    for (int i = 0; i < t.size(); i++) {
      lowerT[i] = tolower(t[i]);
    }

    if (lowerT == w) cnt++;
  }

  cout << cnt << endl;

  return 0;
}
