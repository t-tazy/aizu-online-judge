#include<iostream>
#include<string>
using namespace std;

int main() {
  string str, sub; // 最初の文字が一番下にあるカード
  int n, h;

  while (1) {
    cin >> str >> n;
    if (str == "-") break;

    for (int i = 0; i < n; i++) {
      cin >> h;
      sub = str.substr(0, h);
      str.erase(0, h);
      str.insert(str.size(), sub);
    }
    cout << str << endl;
  }

  return 0;
}
