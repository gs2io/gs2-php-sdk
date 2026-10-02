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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\Config;
use Gs2\Exchange\Model\Await;

/**
 * Result of deleteAwaitByStampTask: Delete Exchange Await as a consume action
 *
 * @see https://docs.gs2.io/api_reference/exchange/stamp_sheet/#gs2exchangedeleteawaitbyuserid
 */
class DeleteAwaitByStampTaskResult implements IResult {
    /** @var Await Exchange Await */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Await|null Exchange Await */
	public function getItem(): ?Await {
		return $this->item;
	}

    /** @param Await|null $item Exchange Await */
	public function setItem(?Await $item) {
		$this->item = $item;
	}

    /**
     * @param Await|null $item Exchange Await
     * @return DeleteAwaitByStampTaskResult
     */
	public function withItem(?Await $item): DeleteAwaitByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return DeleteAwaitByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): DeleteAwaitByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteAwaitByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteAwaitByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Await::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}