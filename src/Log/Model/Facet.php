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
 * Facet
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#facet
 */
class Facet implements IModel {
	/**
     * @var string Facet Field Name
	 */
	private $field;
	/**
     * @var array Array of values and counts for string facets
	 */
	private $values;
	/**
     * @var NumericRange Numeric range under current filter conditions
	 */
	private $range;
	/**
     * @var NumericRange Full data range before filters (for UI slider range)
	 */
	private $globalRange;
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
     * @return Facet
     */
	public function withField(?string $field): Facet {
		$this->field = $field;
		return $this;
	}
    /** @return array|null Array of values and counts for string facets */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Array of values and counts for string facets */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Array of values and counts for string facets
     * @return Facet
     */
	public function withValues(?array $values): Facet {
		$this->values = $values;
		return $this;
	}
    /** @return NumericRange|null Numeric range under current filter conditions */
	public function getRange(): ?NumericRange {
		return $this->range;
	}
    /** @param NumericRange|null $range Numeric range under current filter conditions */
	public function setRange(?NumericRange $range) {
		$this->range = $range;
	}
    /**
     * @param NumericRange|null $range Numeric range under current filter conditions
     * @return Facet
     */
	public function withRange(?NumericRange $range): Facet {
		$this->range = $range;
		return $this;
	}
    /** @return NumericRange|null Full data range before filters (for UI slider range) */
	public function getGlobalRange(): ?NumericRange {
		return $this->globalRange;
	}
    /** @param NumericRange|null $globalRange Full data range before filters (for UI slider range) */
	public function setGlobalRange(?NumericRange $globalRange) {
		$this->globalRange = $globalRange;
	}
    /**
     * @param NumericRange|null $globalRange Full data range before filters (for UI slider range)
     * @return Facet
     */
	public function withGlobalRange(?NumericRange $globalRange): Facet {
		$this->globalRange = $globalRange;
		return $this;
	}

    public static function fromJson(?array $data): ?Facet {
        if ($data === null) {
            return null;
        }
        return (new Facet())
            ->withField(array_key_exists('field', $data) && $data['field'] !== null ? $data['field'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return FacetValueCount::fromJson($item);
                },
                $data['values']
            ))
            ->withRange(array_key_exists('range', $data) && $data['range'] !== null ? NumericRange::fromJson($data['range']) : null)
            ->withGlobalRange(array_key_exists('globalRange', $data) && $data['globalRange'] !== null ? NumericRange::fromJson($data['globalRange']) : null);
    }

    public function toJson(): array {
        return array(
            "field" => $this->getField(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getValues()
            ),
            "range" => $this->getRange() !== null ? $this->getRange()->toJson() : null,
            "globalRange" => $this->getGlobalRange() !== null ? $this->getGlobalRange()->toJson() : null,
        );
    }
}