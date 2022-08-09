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

namespace Gs2\Log\Result;

use Gs2\Core\Model\IResult;
use Gs2\Log\Model\Insight;

class CreateInsightResult implements IResult {
    /** @var Insight */
    private $item;

	public function getItem(): ?Insight {
		return $this->item;
	}

	public function setItem(?Insight $item) {
		$this->item = $item;
	}

	public function withItem(?Insight $item): CreateInsightResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateInsightResult {
        if ($data === null) {
            return null;
        }
        return (new CreateInsightResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Insight::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}