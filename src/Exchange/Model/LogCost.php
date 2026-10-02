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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


/**
 * Cost Calculation Result Using Logarithm
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#logcost
 */
class LogCost implements IModel {
	/**
     * @var float Base
	 */
	private $base;
	/**
     * @var array List of logs to be added
	 */
	private $adds;
	/**
     * @var array List of logs to be subtracted
	 */
	private $subs;
    /** @return float|null Base */
	public function getBase(): ?float {
		return $this->base;
	}
    /** @param float|null $base Base */
	public function setBase(?float $base) {
		$this->base = $base;
	}
    /**
     * @param float|null $base Base
     * @return LogCost
     */
	public function withBase(?float $base): LogCost {
		$this->base = $base;
		return $this;
	}
    /** @return array|null List of logs to be added */
	public function getAdds(): ?array {
		return $this->adds;
	}
    /** @param array|null $adds List of logs to be added */
	public function setAdds(?array $adds) {
		$this->adds = $adds;
	}
    /**
     * @param array|null $adds List of logs to be added
     * @return LogCost
     */
	public function withAdds(?array $adds): LogCost {
		$this->adds = $adds;
		return $this;
	}
    /** @return array|null List of logs to be subtracted */
	public function getSubs(): ?array {
		return $this->subs;
	}
    /** @param array|null $subs List of logs to be subtracted */
	public function setSubs(?array $subs) {
		$this->subs = $subs;
	}
    /**
     * @param array|null $subs List of logs to be subtracted
     * @return LogCost
     */
	public function withSubs(?array $subs): LogCost {
		$this->subs = $subs;
		return $this;
	}

    public static function fromJson(?array $data): ?LogCost {
        if ($data === null) {
            return null;
        }
        return (new LogCost())
            ->withBase(array_key_exists('base', $data) && $data['base'] !== null ? $data['base'] : null)
            ->withAdds(!array_key_exists('adds', $data) || $data['adds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['adds']
            ))
            ->withSubs(!array_key_exists('subs', $data) || $data['subs'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['subs']
            ));
    }

    public function toJson(): array {
        return array(
            "base" => $this->getBase(),
            "adds" => $this->getAdds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAdds()
            ),
            "subs" => $this->getSubs() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getSubs()
            ),
        );
    }
}