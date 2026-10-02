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
use Gs2\Identifier\Model\ProjectToken;

/**
 * Result of loginByUser: Get a Project Token by specifying a GS2-Identifier user
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#loginbyuser
 */
class LoginByUserResult implements IResult {
    /** @var ProjectToken Project Token */
    private $item;

    /** @return ProjectToken|null Project Token */
	public function getItem(): ?ProjectToken {
		return $this->item;
	}

    /** @param ProjectToken|null $item Project Token */
	public function setItem(?ProjectToken $item) {
		$this->item = $item;
	}

    /**
     * @param ProjectToken|null $item Project Token
     * @return LoginByUserResult
     */
	public function withItem(?ProjectToken $item): LoginByUserResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?LoginByUserResult {
        if ($data === null) {
            return null;
        }
        return (new LoginByUserResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ProjectToken::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}