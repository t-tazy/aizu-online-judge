#include<iostream>
#include<cctype>
using namespace std;

int main() {
  char ch;
  int count[26] = {};
                  //
  // EOFまで読み込む
  while (cin >> ch) {
    if (isalpha(ch)) {
      count[tolower(ch) - 'a'] += 1;
    }
  }

  for (int i = 0; i < 26; i++) {
    cout << static_cast<char>(i + 'a') << ' ' << ':' << ' ' << count[i] << endl;
  }

  return 0;
}
