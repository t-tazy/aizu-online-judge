#include<iostream>
#include<cctype>
using namespace std;

int main() {
  char c;

  while(1) {
    cin.get(c); // 改行も取得できるように

    if (isdigit(c)) {
      cout << c;
      continue;
    }

    if (islower(c)) cout << static_cast<char>(toupper(c));
    else cout << static_cast<char>(tolower(c));

    if (c == '\n') break; // 改行の場合も出力するため、breakは最後
  }

  return 0;
}
