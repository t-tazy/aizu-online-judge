#include<iostream>
#include<cstring>
using namespace std;

int main() {
  char s[201], t[101], p[100];

  cin >> s >> p;
  strcpy(t, s); // 自己連結だとstach smashing detected
  strcat(s, t);

  if (strstr(s, p)) cout << "Yes" << endl;
  else cout << "No" << endl;

  return 0;
}
