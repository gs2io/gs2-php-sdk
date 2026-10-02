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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\SalesItem;
use Gs2\Showcase\Model\SalesItemGroup;
use Gs2\Showcase\Model\DisplayItem;
use Gs2\Showcase\Model\Showcase;

/**
 * Result of getShowcase: Get Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#getshowcase
 */
class GetShowcaseResult implements IResult {
    /** @var Showcase Showcase */
    private $item;

    /** @return Showcase|null Showcase */
	public function getItem(): ?Showcase {
		return $this->item;
	}

    /** @param Showcase|null $item Showcase */
	public function setItem(?Showcase $item) {
		$this->item = $item;
	}

    /**
     * @param Showcase|null $item Showcase
     * @return GetShowcaseResult
     */
	public function withItem(?Showcase $item): GetShowcaseResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetShowcaseResult {
        if ($data === null) {
            return null;
        }
        return (new GetShowcaseResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Showcase::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}