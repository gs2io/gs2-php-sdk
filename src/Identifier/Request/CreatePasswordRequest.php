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
 * Request for createPassword: Create password
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#createpassword
 */
class CreatePasswordRequest extends Gs2BasicRequest {
    /** @var string User Name */
    private $userName;
    /** @var string Password */
    private $password;
    /** @return string|null User Name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User Name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User Name
     * @return CreatePasswordRequest
     */
	public function withUserName(?string $userName): CreatePasswordRequest {
		$this->userName = $userName;
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
     * @return CreatePasswordRequest
     */
	public function withPassword(?string $password): CreatePasswordRequest {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?CreatePasswordRequest {
        if ($data === null) {
            return null;
        }
        return (new CreatePasswordRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "password" => $this->getPassword(),
        );
    }
}