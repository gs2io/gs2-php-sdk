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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for loginByUser: Get a Project Token by specifying a GS2-Identifier user
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#loginbyuser
 */
class LoginByUserRequest extends Gs2BasicRequest {
    /** @var string GS2-Identifier username */
    private $userName;
    /** @var string Password for GS2-Identifier user */
    private $password;
    /** @var string Passcode */
    private $otp;
    /** @return string|null GS2-Identifier username */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName GS2-Identifier username */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName GS2-Identifier username
     * @return LoginByUserRequest
     */
	public function withUserName(?string $userName): LoginByUserRequest {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null Password for GS2-Identifier user */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password for GS2-Identifier user */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password for GS2-Identifier user
     * @return LoginByUserRequest
     */
	public function withPassword(?string $password): LoginByUserRequest {
		$this->password = $password;
		return $this;
	}
    /** @return string|null Passcode */
	public function getOtp(): ?string {
		return $this->otp;
	}
    /** @param string|null $otp Passcode */
	public function setOtp(?string $otp) {
		$this->otp = $otp;
	}
    /**
     * @param string|null $otp Passcode
     * @return LoginByUserRequest
     */
	public function withOtp(?string $otp): LoginByUserRequest {
		$this->otp = $otp;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginByUserRequest {
        if ($data === null) {
            return null;
        }
        return (new LoginByUserRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withOtp(array_key_exists('otp', $data) && $data['otp'] !== null ? $data['otp'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "password" => $this->getPassword(),
            "otp" => $this->getOtp(),
        );
    }
}