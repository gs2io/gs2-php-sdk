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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DeletePropertyFormModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $propertyFormModelName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DeletePropertyFormModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
	public function withPropertyFormModelName(?string $propertyFormModelName): DeletePropertyFormModelMasterRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeletePropertyFormModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeletePropertyFormModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyFormModelName" => $this->getPropertyFormModelName(),
        );
    }
}