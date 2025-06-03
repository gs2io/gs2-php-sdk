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

class GetStageResult implements IResult {
    /** @var Stage */
    private $item;
    /** @var array */
    private $source;
    /** @var array */
    private $current;

	public function getItem(): ?Stage {
		return $this->item;
	}

	public function setItem(?Stage $item) {
		$this->item = $item;
	}

	public function withItem(?Stage $item): GetStageResult {
		$this->item = $item;
		return $this;
	}

	public function getSource(): ?array {
		return $this->source;
	}

	public function setSource(?array $source) {
		$this->source = $source;
	}

	public function withSource(?array $source): GetStageResult {
		$this->source = $source;
		return $this;
	}

	public function getCurrent(): ?array {
		return $this->current;
	}

	public function setCurrent(?array $current) {
		$this->current = $current;
	}

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