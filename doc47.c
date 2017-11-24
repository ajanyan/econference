#include<stdio.h>
#include<stdlib.h>
struct NODE
{
	int data;
	struct NODE *link;
};
typedef struct NODE node;
void create_sll(node*,int);
void display_sll(node*);
void del_front(node*);
void del_end(node*);
void del_any(node*);

void main()
{
	int n,flag,x;
	char opt;
	node *header;
	header=(node*)malloc(sizeof(node));
	header->data=(int)NULL;
	printf("number of elements in the linked list?\n");
	scanf("%d",&n);
	create_sll(header,n);
	printf("the list is :\n");
	display_sll(header);
	do
	{
	printf("\n\n\tDELETION OF A NODE\n\n");
			printf("1. from the beginning\n2. from the end\n3. the element you require\n");
			printf("enter your choice:\n");
			scanf("%d",&flag);
			switch(flag)
			{
				case 1:
				{
					del_front(header);
				}break;
				case 2:
				{
					del_end(header);
				}break;
				case 3:
				{
					del_any(header);
				}break;
				default:
				{
					printf("invalid choice\n");
				}
			}
		printf("list after deletion:\n");
		display_sll(header);
		printf("do u want to continue?Y/N??\n");
		scanf("%s",&opt);
		}
		while(opt=='Y');
}


void create_sll(node *header,int n)
{
	int i,x;
	node *ptr;
	ptr=(node*)malloc(sizeof(node));
	header->link=ptr;
	printf("enter the elements\n");
	for(i=1;i<n;++i)
	{
		scanf("%d",&x);
		ptr->data=x;
		ptr->link=(node*)malloc(sizeof(node));
		ptr=ptr->link;
	}
	scanf("%d",&x);
	ptr->data=x;
	ptr->link=NULL;
}

void display_sll(node *header)
{
	node *ptr;
	ptr=header->link;
	while(ptr!=NULL)
	{
		printf("%d\n",ptr->data);
		ptr=ptr->link;
	}
	printf("\n");
}

void del_front(node *header)
{
	node *ptr;
	if(header==NULL)
	{
		printf("list is empty\n");
		return;
	}
	else
	{
		ptr=header->link;
		header->link=ptr->link;
		free(ptr);
	}
}
	
void del_end(node *header)
{
	node *ptr,*ptr1;
	if(header==NULL)
	{
		printf("list is empty\n");
		return;
	}
	else
	{
		ptr=header->link;
		while(ptr->link!=NULL)
		{
			ptr1=ptr;
			ptr=ptr->link;
		}
		ptr1->link=NULL;
		free(ptr);
	}
}

void del_any(node *header)
{
	node *ptr,*ptr1;
	int key;
	if(header==NULL)
	{
		printf("list is empty\n");
		return;
	}
	else
	{
		ptr=header->link;
		printf("enter the element to be deleted : ");
		scanf("%d",&key);
		while(ptr->data!=key)
		{
			ptr1=ptr;
			ptr=ptr->link;
		}
		ptr1->link=ptr->link;
		free(ptr);
	}
}		

