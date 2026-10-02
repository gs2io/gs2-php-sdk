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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\Entry;

/**
 * Result of deleteEntriesByStampTask: Execute the entry deletion as a consume action
 *
 * @see https://docs.gs2.io/api_reference/dictionary/stamp_sheet/#gs2dictionarydeleteentriesbyuserid
 */
class DeleteEntriesByStampTaskResult implements IResult {
    /** @var array List of Deleted Entries */
    private $items;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return array|null List of Deleted Entries */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Deleted Entries */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Deleted Entries
     * @return DeleteEntriesByStampTaskResult
     */
	public function withItems(?array $items): DeleteEntriesByStampTaskResult {
		$this->items = $items;
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
     * @return DeleteEntriesByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): DeleteEntriesByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteEntriesByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteEntriesByStampTaskResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return Entry::fromJson($item);
                },
                $data['items']
            ))
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}