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
 * Request for updateFacetModel: Update Facet Model
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#updatefacetmodel
 */
class UpdateFacetModelRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Facet Field Name */
    private $field;
    /** @var string Facet Data Type */
    private $type;
    /** @var string Display Name */
    private $displayName;
    /** @var int Display Order */
    private $order;
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
     * @return UpdateFacetModelRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateFacetModelRequest {
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
     * @return UpdateFacetModelRequest
     */
	public function withField(?string $field): UpdateFacetModelRequest {
		$this->field = $field;
		return $this;
	}
    /** @return string|null Facet Data Type */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Facet Data Type */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Facet Data Type
     * @return UpdateFacetModelRequest
     */
	public function withType(?string $type): UpdateFacetModelRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Display Name */
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
    /** @param string|null $displayName Display Name */
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
    /**
     * @param string|null $displayName Display Name
     * @return UpdateFacetModelRequest
     */
	public function withDisplayName(?string $displayName): UpdateFacetModelRequest {
		$this->displayName = $displayName;
		return $this;
	}
    /** @return int|null Display Order */
	public function getOrder(): ?int {
		return $this->order;
	}
    /** @param int|null $order Display Order */
	public function setOrder(?int $order) {
		$this->order = $order;
	}
    /**
     * @param int|null $order Display Order
     * @return UpdateFacetModelRequest
     */
	public function withOrder(?int $order): UpdateFacetModelRequest {
		$this->order = $order;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateFacetModelRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateFacetModelRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withOrder(array_key_exists('order', $data) && $data['order'] !== null ? $data['order'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "field" => $this->getField(),
            "type" => $this->getType(),
            "displayName" => $this->getDisplayName(),
            "order" => $this->getOrder(),
        );
    }
}