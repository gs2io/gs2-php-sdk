<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/** Request for createAccount: Create Account */
class CreateAccountRequest extends Gs2BasicRequest {
    /** @var string E-Mail */
    private $email;
    /** @var string Full Name */
    private $fullName;
    /** @var string Company Name */
    private $companyName;
    /** @var string Password */
    private $password;
    /** @var string Language of the email to be sent */
    private $lang;
    /** @return string|null E-Mail */
	public function getEmail(): ?string {
		return $this->email;
	}
    /** @param string|null $email E-Mail */
	public function setEmail(?string $email) {
		$this->email = $email;
	}
    /**
     * @param string|null $email E-Mail
     * @return CreateAccountRequest
     */
	public function withEmail(?string $email): CreateAccountRequest {
		$this->email = $email;
		return $this;
	}
    /** @return string|null Full Name */
	public function getFullName(): ?string {
		return $this->fullName;
	}
    /** @param string|null $fullName Full Name */
	public function setFullName(?string $fullName) {
		$this->fullName = $fullName;
	}
    /**
     * @param string|null $fullName Full Name
     * @return CreateAccountRequest
     */
	public function withFullName(?string $fullName): CreateAccountRequest {
		$this->fullName = $fullName;
		return $this;
	}
    /** @return string|null Company Name */
	public function getCompanyName(): ?string {
		return $this->companyName;
	}
    /** @param string|null $companyName Company Name */
	public function setCompanyName(?string $companyName) {
		$this->companyName = $companyName;
	}
    /**
     * @param string|null $companyName Company Name
     * @return CreateAccountRequest
     */
	public function withCompanyName(?string $companyName): CreateAccountRequest {
		$this->companyName = $companyName;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return CreateAccountRequest
     */
	public function withPassword(?string $password): CreateAccountRequest {
		$this->password = $password;
		return $this;
	}
    /** @return string|null Language of the email to be sent */
	public function getLang(): ?string {
		return $this->lang;
	}
    /** @param string|null $lang Language of the email to be sent */
	public function setLang(?string $lang) {
		$this->lang = $lang;
	}
    /**
     * @param string|null $lang Language of the email to be sent
     * @return CreateAccountRequest
     */
	public function withLang(?string $lang): CreateAccountRequest {
		$this->lang = $lang;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateAccountRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateAccountRequest())
            ->withEmail(array_key_exists('email', $data) && $data['email'] !== null ? $data['email'] : null)
            ->withFullName(array_key_exists('fullName', $data) && $data['fullName'] !== null ? $data['fullName'] : null)
            ->withCompanyName(array_key_exists('companyName', $data) && $data['companyName'] !== null ? $data['companyName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withLang(array_key_exists('lang', $data) && $data['lang'] !== null ? $data['lang'] : null);
    }

    public function toJson(): array {
        return array(
            "email" => $this->getEmail(),
            "fullName" => $this->getFullName(),
            "companyName" => $this->getCompanyName(),
            "password" => $this->getPassword(),
            "lang" => $this->getLang(),
        );
    }
}