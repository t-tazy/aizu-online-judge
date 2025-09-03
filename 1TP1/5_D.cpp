#include<iostream>
using namespace std;

/*
 * 3の倍数もしくは3のつく数なら出力
 */
int main() {
  int n;
  cin >> n;

  for (int i = 1; i <= n; i++) {
    if (i % 3 == 0) {
      cout << ' ' << i;
      continue;
    };
    
    // 3の倍数ではない場合、各位の値に3がないか確認する
    // 10進数なので10（桁上がりの数字）の剰余が各位の数字になる
    for (int j = i; j; j /= 10) {
      if (j % 10 == 3) {
        cout << ' ' << i;
	break;
      }
    }
  }

  cout << endl;

  return 0;
}
