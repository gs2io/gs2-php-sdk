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
 * Result of cancelDeletionByUserId: Cancel the deletion request of the Game Player Account by User ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#canceldeletionbyuserid
 */
class CancelDeletionByUserIdResult implements IResult {
    /** @var Account Game Player Account whose deletion request was cancelled */
    private $item;

    /** @return Account|null Game Player Account whose deletion request was cancelled */
	public function getItem(): ?Account {
		return $this->item;
	}

    /** @param Account|null $item Game Player Account whose deletion request was cancelled */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    /**
     * @param Account|null $item Game Player Account whose deletion request was cancelled
     * @return CancelDeletionByUserIdResult
     */
	public function withItem(?Account $item): CancelDeletionByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CancelDeletionByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new CancelDeletionByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Account::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}