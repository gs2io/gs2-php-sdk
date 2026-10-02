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

namespace Gs2\Idle\Result;

use Gs2\Core\Model\IResult;
use Gs2\Idle\Model\AcquireAction;
use Gs2\Idle\Model\AcquireActionList;
use Gs2\Idle\Model\CategoryModel;

/**
 * Result of getCategoryModel: Get Category Model
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#getcategorymodel
 */
class GetCategoryModelResult implements IResult {
    /** @var CategoryModel Category Model */
    private $item;

    /** @return CategoryModel|null Category Model */
	public function getItem(): ?CategoryModel {
		return $this->item;
	}

    /** @param CategoryModel|null $item Category Model */
	public function setItem(?CategoryModel $item) {
		$this->item = $item;
	}

    /**
     * @param CategoryModel|null $item Category Model
     * @return GetCategoryModelResult
     */
	public function withItem(?CategoryModel $item): GetCategoryModelResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetCategoryModelResult {
        if ($data === null) {
            return null;
        }
        return (new GetCategoryModelResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? CategoryModel::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}