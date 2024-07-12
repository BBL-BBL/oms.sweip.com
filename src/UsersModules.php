<?php

namespace OmsSweip;

require_once 'oms-sweip.php';

class UsersModules extends BasicAPI
{
    public function __construct($appToken, $appKey)
    {
        parent::__construct($appToken, $appKey);
    }

    /**
     * @param $user_code String Require 账户
     * @return void
     */
    public function setUserCode(string $user_code)
    {
        $this->params["user_code"] = $user_code;
    }

    /**
     * @param $user_password String Require 密码
     * @return void
     */
    public function setUserPassword(string $user_password)
    {
        $this->params["user_password"] = $user_password;
    }

    /**
     * @param $allocate_warehouse Int Option 是否分配仓库：0或空表示不分配，1表示分配分销类型的可用仓库，2表示分配所有可用仓库
     * @return void
     */
    public function setAllocateWarehouse(int $allocate_warehouse)
    {
        $this->params["allocate_warehouse"] = $allocate_warehouse;
    }

    /**
     * @param $user_password_confirm String Require 确认密码
     * @return void
     */
    public function setUserPasswordConfirm(string $user_password_confirm)
    {
        $this->params["user_password_confirm"] = $user_password_confirm;
    }

    /**
     * @param $user_email String Require 邮箱
     * @return void
     */
    public function setUserEmail(string $user_email)
    {
        $this->params["user_email"] = $user_email;
    }

    /**
     * @param $user_name String Require 姓名
     * @return void
     */
    public function setUserName(string $user_name)
    {
        $this->params["user_name"] = $user_name;
    }

    /**
     * @param $company_name String Option 公司名称
     * @return void
     */
    public function setCompanyName(string $company_name)
    {
        $this->params["company_name"] = $company_name;
    }

    /**
     * @param $user_mobile_phone String Option 手机号码
     * @return void
     */
    public function setUserMobilePhone(string $user_mobile_phone)
    {
        $this->params["user_mobile_phone"] = $user_mobile_phone;
    }

    /**
     * @param $user_phone String Option 联系电话
     * @return void
     */
    public function setUserPhone(string $user_phone)
    {
        $this->params["user_phone"] = $user_phone;
    }

    /**
     * @param $user_address String Option 联系地址
     * @return void
     */
    public function setUserAddress(string $user_address)
    {
        $this->params["user_address"] = $user_address;
    }


    /**
     * 注册OMS账户
     * @user_code String Require 账户
     * @user_password String Require 密码
     * @allocate_warehouse Int Option 是否分配仓库：0或空表示不分配，1表示分配分销类型的可用仓库，2表示分配所有可用仓库
     * @user_password_confirm String Require 确认密码
     * @user_email String Require 邮箱
     * @user_name String Require 姓名
     * @company_name String Option 公司名称
     * @user_mobile_phone String Option 手机号码
     * @user_phone String Option 联系电话
     * @user_address String Option 联系地址
     * 示例：
     * {
     *      "user_code":"pig15",
     *      "user_password":"fx123456",
     *      "user_password_confirm":"fx123456",
     *      "allocate_warehouse":"0",
     *      "user_email":"fx0015@qq.com",
     *      "user_name":"分销0015",
     *      "company_name":"FX0015",
     *      "user_mobile_phone":"123456",
     *      "user_phone":"12345678",
     *      "user_address":"武汉市洪山区"
     * }
     * @return array|mixed
     */
    public function register()
    {
        $this->setService("register");
        return $this->PostSoapXML();
    }

    /**
     * 获取登陆token
     * @company_code    String    Require    客户代码
     * 示例：{ "company_code":"A001" }
     * @return array|mixed
     */
    public function getSsoToken()
    {
        $this->setService("getSsoToken");
        return $this->PostSoapXML();
    }

    /**
     * @param $user_account String Require 账户
     * @return void
     */
    public function setUserAccount($user_account)
    {
        $this->params["user_account"] = $user_account;
    }

    /**
     * 登录OMS账户
     * @user_account String Require 账户
     * @user_password String Require 密码
     * 示例：
     * {
     *      "user_account":"A002",
     *      "user_password":"123456"
     * }
     * @return array|mixed
     */
    public function logOn()
    {
        $this->setService("logOn");
        return $this->PostSoapXML();
    }
}
