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
use Gs2\Exchange\Model\TransactionSetting;
use Gs2\Exchange\Model\ScriptSetting;
use Gs2\Exchange\Model\LogSetting;
use Gs2\Exchange\Model\Namespace_;

class DeleteNamespaceResult implements IResult {
    /** @var Namespace_ */
    private $item;

	public function getItem(): ?Namespace_ {
		return $this->item;
	}

	public function setItem(?Namespace_ $item) {
		$this->item = $item;
	}

	public function withItem(?Namespace_ $item): DeleteNamespaceResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteNamespaceResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteNamespaceResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Namespace_::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}