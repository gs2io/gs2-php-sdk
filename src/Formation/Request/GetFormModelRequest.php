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

class GetFormModelRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $formModelName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetFormModelRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}
	public function withFormModelName(?string $formModelName): GetFormModelRequest {
		$this->formModelName = $formModelName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFormModelRequest {
        if ($data === null) {
            return null;
        }
        return (new GetFormModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "formModelName" => $this->getFormModelName(),
        );
    }
}