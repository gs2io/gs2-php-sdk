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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


/**
 * Facet Model
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#facetmodel
 */
class FacetModel implements IModel {
	/**
     * @var string Facet Model GRN
	 */
	private $facetModelId;
	/**
     * @var string Facet Field Name
	 */
	private $field;
	/**
     * @var string Facet Data Type
	 */
	private $type;
	/**
     * @var string Display Name
	 */
	private $displayName;
	/**
     * @var int Display Order
	 */
	private $order;
    /** @return string|null Facet Model GRN */
	public function getFacetModelId(): ?string {
		return $this->facetModelId;
	}
    /** @param string|null $facetModelId Facet Model GRN */
	public function setFacetModelId(?string $facetModelId) {
		$this->facetModelId = $facetModelId;
	}
    /**
     * @param string|null $facetModelId Facet Model GRN
     * @return FacetModel
     */
	public function withFacetModelId(?string $facetModelId): FacetModel {
		$this->facetModelId = $facetModelId;
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
     * @return FacetModel
     */
	public function withField(?string $field): FacetModel {
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
     * @return FacetModel
     */
	public function withType(?string $type): FacetModel {
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
     * @return FacetModel
     */
	public function withDisplayName(?string $displayName): FacetModel {
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
     * @return FacetModel
     */
	public function withOrder(?int $order): FacetModel {
		$this->order = $order;
		return $this;
	}

    public static function fromJson(?array $data): ?FacetModel {
        if ($data === null) {
            return null;
        }
        return (new FacetModel())
            ->withFacetModelId(array_key_exists('facetModelId', $data) && $data['facetModelId'] !== null ? $data['facetModelId'] : null)
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withOrder(array_key_exists('order', $data) && $data['order'] !== null ? $data['order'] : null);
    }

    public function toJson(): array {
        return array(
            "facetModelId" => $this->getFacetModelId(),
            "field" => $this->getField(),
            "type" => $this->getType(),
            "displayName" => $this->getDisplayName(),
            "order" => $this->getOrder(),
        );
    }
}