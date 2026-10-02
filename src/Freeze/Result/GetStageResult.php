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

namespace Gs2\Freeze\Result;

use Gs2\Core\Model\IResult;
use Gs2\Freeze\Model\Stage;
use Gs2\Freeze\Model\Microservice;

/**
 * Result of getStage: Get stage
 *
 * @see https://docs.gs2.io/api_reference/freeze/sdk/#getstage
 */
class GetStageResult implements IResult {
    /** @var Stage Stage */
    private $item;
    /** @var array List of source microservice versions */
    private $source;
    /** @var array List of current microservice versions */
    private $current;

    /** @return Stage|null Stage */
	public function getItem(): ?Stage {
		return $this->item;
	}

    /** @param Stage|null $item Stage */
	public function setItem(?Stage $item) {
		$this->item = $item;
	}

    /**
     * @param Stage|null $item Stage
     * @return GetStageResult
     */
	public function withItem(?Stage $item): GetStageResult {
		$this->item = $item;
		return $this;
	}

    /** @return array|null List of source microservice versions */
	public function getSource(): ?array {
		return $this->source;
	}

    /** @param array|null $source List of source microservice versions */
	public function setSource(?array $source) {
		$this->source = $source;
	}

    /**
     * @param array|null $source List of source microservice versions
     * @return GetStageResult
     */
	public function withSource(?array $source): GetStageResult {
		$this->source = $source;
		return $this;
	}

    /** @return array|null List of current microservice versions */
	public function getCurrent(): ?array {
		return $this->current;
	}

    /** @param array|null $current List of current microservice versions */
	public function setCurrent(?array $current) {
		$this->current = $current;
	}

    /**
     * @param array|null $current List of current microservice versions
     * @return GetStageResult
     */
	public function withCurrent(?array $current): GetStageResult {
		$this->current = $current;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStageResult {
        if ($data === null) {
            return null;
        }
        return (new GetStageResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Stage::fromJson($data['item']) : null)
            ->withSource(!array_key_exists('source', $data) || $data['source'] === null ? null : array_map(
                function ($item) {
                    return Microservice::fromJson($item);
                },
                $data['source']
            ))
            ->withCurrent(!array_key_exists('current', $data) || $data['current'] === null ? null : array_map(
                function ($item) {
                    return Microservice::fromJson($item);
                },
                $data['current']
            ));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "source" => $this->getSource() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSource()
            ),
            "current" => $this->getCurrent() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCurrent()
            ),
        );
    }
}