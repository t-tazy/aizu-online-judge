#include<iostream>
using namespace std;

int main() {
  int min = 1000000, max = -1000000, n, a;
  long long sum = 0; // 10^6 が 10^4個入力されるため、10^10を保持できる必要がある

  cin >> n;

  for (int i = 0; i < n; i++) {
    cin >> a;
    if (min > a) min = a;
    if (max < a) max = a;
    sum += a;
  }

  cout << min << ' ' << max << ' ' << sum << endl;

  return 0;
}
