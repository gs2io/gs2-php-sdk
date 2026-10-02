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
use Gs2\Account\Model\BanStatus;
use Gs2\Account\Model\Account;

/**
 * Result of removeBan: Remove the Account Ban Status for a Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#removeban
 */
class RemoveBanResult implements IResult {
    /** @var Account Game Player Account updated */
    private $item;

    /** @return Account|null Game Player Account updated */
	public function getItem(): ?Account {
		return $this->item;
	}

    /** @param Account|null $item Game Player Account updated */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    /**
     * @param Account|null $item Game Player Account updated
     * @return RemoveBanResult
     */
	public function withItem(?Account $item): RemoveBanResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?RemoveBanResult {
        if ($data === null) {
            return null;
        }
        return (new RemoveBanResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Account::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}