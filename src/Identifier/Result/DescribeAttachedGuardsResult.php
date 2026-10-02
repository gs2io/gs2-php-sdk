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

/**
 * Result of describeAttachedGuards: List assigned GS2-Guard Namespace GRNs
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#describeattachedguards
 */
class DescribeAttachedGuardsResult implements IResult {
    /** @var array List of GS2-Guard Namespace GRN */
    private $items;

    /** @return array|null List of GS2-Guard Namespace GRN */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of GS2-Guard Namespace GRN */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of GS2-Guard Namespace GRN
     * @return DescribeAttachedGuardsResult
     */
	public function withItems(?array $items): DescribeAttachedGuardsResult {
		$this->items = $items;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeAttachedGuardsResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeAttachedGuardsResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['items']
            ));
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getItems()
            ),
        );
    }
}