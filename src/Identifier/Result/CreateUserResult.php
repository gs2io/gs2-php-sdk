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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\User;

/**
 * Result of createUser: Create User
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#createuser
 */
class CreateUserResult implements IResult {
    /** @var User Created User */
    private $item;

    /** @return User|null Created User */
	public function getItem(): ?User {
		return $this->item;
	}

    /** @param User|null $item Created User */
	public function setItem(?User $item) {
		$this->item = $item;
	}

    /**
     * @param User|null $item Created User
     * @return CreateUserResult
     */
	public function withItem(?User $item): CreateUserResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateUserResult {
        if ($data === null) {
            return null;
        }
        return (new CreateUserResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? User::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}