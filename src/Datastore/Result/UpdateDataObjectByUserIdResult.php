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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;
use Gs2\Datastore\Model\DataObject;

/**
 * Result of updateDataObjectByUserId: Update Data Object by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#updatedataobjectbyuserid
 */
class UpdateDataObjectByUserIdResult implements IResult {
    /** @var DataObject Data object */
    private $item;

    /** @return DataObject|null Data object */
	public function getItem(): ?DataObject {
		return $this->item;
	}

    /** @param DataObject|null $item Data object */
	public function setItem(?DataObject $item) {
		$this->item = $item;
	}

    /**
     * @param DataObject|null $item Data object
     * @return UpdateDataObjectByUserIdResult
     */
	public function withItem(?DataObject $item): UpdateDataObjectByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDataObjectByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateDataObjectByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? DataObject::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}