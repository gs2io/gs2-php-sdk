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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteFacetModel: Delete Facet Model
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#deletefacetmodel
 */
class DeleteFacetModelRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Facet Field Name */
    private $field;
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
     * @return DeleteFacetModelRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteFacetModelRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Facet Field Name */
	public function getField(): ?string {
		return $this->field;
	}
    /** @param string|null $field Facet Field Name */
	public function setField(?string $field) {
		$this->field = $field;
	}
    /**
     * @param string|null $field Facet Field Name
     * @return DeleteFacetModelRequest
     */
	public function withField(?string $field): DeleteFacetModelRequest {
		$this->field = $field;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteFacetModelRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteFacetModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "field" => $this->getField(),
        );
    }
}