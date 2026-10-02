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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;
use Gs2\Limit\Model\Counter;

/**
 * Result of countUpByStampTask: Execute count-up as consume action
 *
 * @see https://docs.gs2.io/api_reference/limit/stamp_sheet/#gs2limitcountupbyuserid
 */
class CountUpByStampTaskResult implements IResult {
    /** @var Counter Counter with increased count */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Counter|null Counter with increased count */
	public function getItem(): ?Counter {
		return $this->item;
	}

    /** @param Counter|null $item Counter with increased count */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    /**
     * @param Counter|null $item Counter with increased count
     * @return CountUpByStampTaskResult
     */
	public function withItem(?Counter $item): CountUpByStampTaskResult {
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
     * @return CountUpByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): CountUpByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?CountUpByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new CountUpByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Counter::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}