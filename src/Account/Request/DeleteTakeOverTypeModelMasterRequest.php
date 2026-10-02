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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteTakeOverTypeModelMaster: Delete Takeover Type Model Master
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#deletetakeovertypemodelmaster
 */
class DeleteTakeOverTypeModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Slot Number */
    private $type;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DeleteTakeOverTypeModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteTakeOverTypeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return DeleteTakeOverTypeModelMasterRequest
     */
	public function withType(?int $type): DeleteTakeOverTypeModelMasterRequest {
		$this->type = $type;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteTakeOverTypeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteTakeOverTypeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "type" => $this->getType(),
        );
    }
}