#include<iostream>
using namespace std;

// 重複なしだからxを考慮しない組み合わせは
// n * (n - 1) * (n - 2)
int main() {
  int n, x;

  while(1) {
    int cnt = 0;
    cin >> n >> x;
    if (n == 0 && x == 0) break;

    // 組み合わせだから順番は考慮しなくて良い
    // j, kは単純に+1ずつしてけばok
    for (int i = 1; i <= n - 2; i++) {
      for (int j = i + 1; j <= n - 1; j++) {
        for (int k = j + 1; k <= n; k++) {
          if (i + j + k == x) cnt++;
        }
      }
    }

    cout << cnt << endl;
  }

  return 0;
}
