#include<iostream>
using namespace std;

int main() {
  int a, b, c, max, t;
  cin >> a >> b >> c;

  // cを最大値とする

  if (a > b) {
    t = a;
    a = b;
    b = t;
  }
  if (b > c) {
    t = b;
    b = c;
    c = t;
  }
  // 本来ならループ処理
  // TODO: swap関数も作るべき
  if (a > b) {
    t = a;
    a = b;
    b = t;
  }

  cout << a << ' ' << b << ' ' << c << endl;

  return 0;
}
