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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;
use Gs2\Account\Model\TakeOver;

/**
 * Result of issueTakeOverCodeByUserId: Issue Takeover Code by User ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#issuetakeovercodebyuserid
 */
class IssueTakeOverCodeByUserIdResult implements IResult {
    /** @var TakeOver Takeover Information issued. userIdentifier is the issued user ID, and expiresAt is when the code expires */
    private $item;
    /** @var string Issued password. Only the hash is stored, so it cannot be retrieved again after this response */
    private $password;

    /** @return TakeOver|null Takeover Information issued. userIdentifier is the issued user ID, and expiresAt is when the code expires */
	public function getItem(): ?TakeOver {
		return $this->item;
	}

    /** @param TakeOver|null $item Takeover Information issued. userIdentifier is the issued user ID, and expiresAt is when the code expires */
	public function setItem(?TakeOver $item) {
		$this->item = $item;
	}

    /**
     * @param TakeOver|null $item Takeover Information issued. userIdentifier is the issued user ID, and expiresAt is when the code expires
     * @return IssueTakeOverCodeByUserIdResult
     */
	public function withItem(?TakeOver $item): IssueTakeOverCodeByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Issued password. Only the hash is stored, so it cannot be retrieved again after this response */
	public function getPassword(): ?string {
		return $this->password;
	}

    /** @param string|null $password Issued password. Only the hash is stored, so it cannot be retrieved again after this response */
	public function setPassword(?string $password) {
		$this->password = $password;
	}

    /**
     * @param string|null $password Issued password. Only the hash is stored, so it cannot be retrieved again after this response
     * @return IssueTakeOverCodeByUserIdResult
     */
	public function withPassword(?string $password): IssueTakeOverCodeByUserIdResult {
		$this->password = $password;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueTakeOverCodeByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new IssueTakeOverCodeByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? TakeOver::fromJson($data['item']) : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "password" => $this->getPassword(),
        );
    }
}