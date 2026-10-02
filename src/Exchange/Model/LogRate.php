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
 * Logarithmic reward correction
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#lograte
 */
class LogRate implements IModel {
	/**
     * @var float Base
	 */
	private $base;
	/**
     * @var array List of logs
	 */
	private $logs;
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
     * @return LogRate
     */
	public function withBase(?float $base): LogRate {
		$this->base = $base;
		return $this;
	}
    /** @return array|null List of logs */
	public function getLogs(): ?array {
		return $this->logs;
	}
    /** @param array|null $logs List of logs */
	public function setLogs(?array $logs) {
		$this->logs = $logs;
	}
    /**
     * @param array|null $logs List of logs
     * @return LogRate
     */
	public function withLogs(?array $logs): LogRate {
		$this->logs = $logs;
		return $this;
	}

    public static function fromJson(?array $data): ?LogRate {
        if ($data === null) {
            return null;
        }
        return (new LogRate())
            ->withBase(array_key_exists('base', $data) && $data['base'] !== null ? $data['base'] : null)
            ->withLogs(!array_key_exists('logs', $data) || $data['logs'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['logs']
            ));
    }

    public function toJson(): array {
        return array(
            "base" => $this->getBase(),
            "logs" => $this->getLogs() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getLogs()
            ),
        );
    }
}