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
use Gs2\Identifier\Model\TwoFactorAuthenticationSetting;
use Gs2\Identifier\Model\Password;

/**
 * Result of createPassword: Create password
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#createpassword
 */
class CreatePasswordResult implements IResult {
    /** @var Password Created Password */
    private $item;

    /** @return Password|null Created Password */
	public function getItem(): ?Password {
		return $this->item;
	}

    /** @param Password|null $item Created Password */
	public function setItem(?Password $item) {
		$this->item = $item;
	}

    /**
     * @param Password|null $item Created Password
     * @return CreatePasswordResult
     */
	public function withItem(?Password $item): CreatePasswordResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreatePasswordResult {
        if ($data === null) {
            return null;
        }
        return (new CreatePasswordResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Password::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}