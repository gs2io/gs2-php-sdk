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
use Gs2\Exchange\Model\Await;

class DeleteAwaitByStampTaskResult implements IResult {
    /** @var Await */
    private $item;
    /** @var string */
    private $newContextStack;

	public function getItem(): ?Await {
		return $this->item;
	}

	public function setItem(?Await $item) {
		$this->item = $item;
	}

	public function withItem(?Await $item): DeleteAwaitByStampTaskResult {
		$this->item = $item;
		return $this;
	}

	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

	public function withNewContextStack(?string $newContextStack): DeleteAwaitByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteAwaitByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteAwaitByStampTaskResult())
            ->withItem(empty($data['item']) ? null : Await::fromJson($data['item']))
            ->withNewContextStack(empty($data['newContextStack']) ? null : $data['newContextStack']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}